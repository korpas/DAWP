<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Products;
use AppBundle\Entity\Category;
use AppBundle\Form\ProductsType;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use LEKORP\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
class ProductsController extends Controller
{
    /**
     *
     *
     *@Route(path="/products_index",name="app_products_index"
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function productsAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $prodRep = $m->getRepository('AppBundle:Products');
        $query = $prodRep->queryAllProducts();
        $paginator = $this->get('knp_paginator');
        $products = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            Products::PAGINATION_ITEMS,
            [
                'wrap-queries' => true,
            ]
        );
        $response = $this->render(':products:products.html.twig', [
            'products' => $products,
            'titulo' => 'Productos'
        ]);
        return $response;
    }

    /**
     * @Route("/products_insert", name="app_products_insert")
     */
    public function insertAction(Request $request)
    {
        $p = new Products();




        $form = $this->createForm(ProductsType::class, $p);

        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $m = $this->getDoctrine()->getManager();
                $catRepo = $m->getRepository('AppBundle:Category');
                $proRepo = $m->getRepository('AppBundle:Products');

                $p->setOwner($this->getUser());
                $m->persist($p);
                $m->flush();
            }
        }
        return $this->render(':products:insert.html.twig', [
            'form'  => $form->createView(),
            'title' => 'New Product',
        ]);
    }


    /**
     * http://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/converters.html
     *
     * @Route("products_insert/{id}.html", name="app_products_edit")
     */
    public function editAction(Products $products, Request $request)
    {
        /*
         * Without voter
         */
         if (!$this->isGranted('ROLE_USER') and $products->getOwner() != $this->getUser()) {
            throw $this->createAccessDeniedException('You cannot access this page');
         }

        $form = $this->createForm(ProductsType::class, $products, [

        ]);
        $now = new \DateTime();
        $sinceCreated = $now->diff($products->getCreatedAt());
        $minutes = $sinceCreated->days * 24 * 60 + $sinceCreated->h * 60 + $sinceCreated->i;
        if ($minutes > 4 and !$this->isGranted('ROLE_ADMIN')) {
            $form->remove('title');
        }
        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $m = $this->getDoctrine()->getManager();
                $proRepo = $m->getRepository('AppBundle:Products');
                $m->flush();
                $this->addFlash('messages', 'Producto editado');
                return $this->redirectToRoute('app_products_index', ['id' =>$products->getId()]);
            }
        }
        return $this->render(':products:insert.html.twig', [
            'form'  => $form->createView(),
            'title' => 'Edit Product',
        ]);
    }

    /**
     *
     * @Route("/products_remove/{id}", name="app_products_remove")
     * @ParamConverter(name="Products", class="AppBundle:Products")
     */
    public function removeAction(Products $product)
    {
        $m = $this->getDoctrine()->getManager();
        $m->remove($product);
        $m->flush();
        $this->addFlash('messages', 'Eliminado');
        return $this->redirectToRoute('app_products_index');

    }



    /**
     * @Route("/products/category/{categoryname}", name="app_products_byCategory")
     */
    public function productsByCategoryAction(Category $cat, Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $proRepo = $m->getRepository('AppBundle:Products');
        $query = $proRepo->queryProductsByCategoryId($cat->getId());
        $paginator = $this->get('knp_paginator');
        $products = $paginator->paginate($query, $request->query->getInt('page', 1), Products::PAGINATION_ITEMS);
        return $this->render(':products:products.html.twig', [
            'products'  => $products,
            'title'     => '#' . $cat->getCategoryname(),
        ]);
    }
    /**
     * @Route("/products/user/{username}", name="app_products_byUser")
     */
    public function productsByUSerAction(User $user, Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $productRepo = $m->getRepository('AppBundle:Products');
        $query = $productRepo->queryProductsByUserId($user->getId());
        $paginator = $this->get('knp_paginator');
        $products = $paginator->paginate($query, $request->query->getInt('page', 1), Products::PAGINATION_ITEMS);
        return $this->render(':products:products.html.twig', [
            'products'  => $products,
            'user'     => '@' . $user->getUsername(),
        ]);
    }
}
