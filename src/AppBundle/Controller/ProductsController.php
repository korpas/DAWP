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
     * indexAction
     *@Route(path="/products_index",name="app_products_index"
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Products');
        /**
         * @var Products $product
         */
        $product = $repository->findAll();
        return $this->render(':products:index.html.twig',
            [
                'product' => $product,
            ]
        );
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
                $imgRepo = $m->getRepository('AppBundle:Image');

                $p->setOwner($this->getUser());
                $m->persist($p);
                $m->flush();
                return $this->redirectToRoute('app_products_index');
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
            'submit_label'  => 'Edit Article'
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
                return $this->redirectToRoute('app_article_show', ['id' => $products->getId()]);
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
     * @Route("/{id}.html", name="app_products_show")
     */
    public function showAction(Products $products, Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $proRepo = $m->getRepository('AppBundle:Products');
        $query = $proRepo->queryProductsByCategoryId($products->getId());
        $paginator = $this->get('knp_paginator');
        $product = $paginator->paginate($query, $request->query->getInt('page', 1), Products::PAGINATION_ITEMS);
        return $this->render(':products:index.html.twig', [
            'products'   => $products,
            'product'  => $product,
        ]);
    }
    /**
     * @Route("/products/category/{categoryname}", name="app_products_byCategory")
     */
    public function productsByCategoryAction(Category $category, Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $proRepo = $m->getRepository('AppBundle:Products');
        $query = $proRepo->queryProductsByCategoryId($category->getId());
        $paginator = $this->get('knp_paginator');
        $products = $paginator->paginate($query, $request->query->getInt('page', 1), Products::PAGINATION_ITEMS);
        return $this->render(':index:index.html.twig', [
            'products'  => $products,
            'title'     => '#' . $category->getCategoryname(),
        ]);
    }
    /**
     * @Route("/products/user/{username}", name="app_articles_byUser")
     */
    public function articlesByUSerAction(User $user, Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $productRepo = $m->getRepository('AppBundle:Products');
        $query = $productRepo->queryProductsByUserId($user->getId());
        $paginator = $this->get('knp_paginator');
        $products = $paginator->paginate($query, $request->query->getInt('page', 1), Products::PAGINATION_ITEMS);
        return $this->render(':index:index.html.twig', [
            'products'  => $products,
            'title'     => '@' . $user->getUsername(),
        ]);
    }
}
