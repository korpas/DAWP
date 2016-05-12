<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\ProductsType;
use AppBundle\Entity\Products;
use Symfony\Component\HttpFoundation\Request;

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
    public function insertAction()
    {
        $product = new Products();
        $form = $this->createForm(ProductsType::class, $product);
        return $this->render(':products:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_products_do-insert')
            ]
        );
    }

    /**
     * @Route("/products_do-insert", name="app_products_do-insert")
     */
    public function doInsert(Request $request)
    {
        $product = new Products();
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($product);
            $m->flush();
            $this->addFlash('messages', 'Tu producto ha sido añadido');
            return $this->redirectToRoute('app_products_index');
        }
        $this->addFlash('messages', 'Review your form data');
        return $this->render(':products:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_products_do-insert')
            ]
        );
    }

    /**
     * @Route("/products_update/{id}", name="app_products_update")
     */
    public function updateAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Products');
        $asd = $repository->find($id);
        $form = $this->createForm(ProductsType::class, $asd);
        return $this->render(':products:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_products_do-update', ['id' => $id])
            ]
        );
    }
    /**
     * @Route("/products_do-update/{id}", name="app_products_do-update")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function doUpdateAction($id, Request $request)
    {
        $m          = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Products');
        $product      = $repository->find($id);
        $form       = $this->createForm(ProductsType::class, $product);
        // user is updated with incoming data
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m->flush();
            $this->addFlash('messages', 'Actualizado');
            return $this->redirectToRoute('app_products_index');
        }
        $this->addFlash('messages', 'Review your form');
        return $this->render(':products:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_products_index', ['id' => $id]),
            ]
        );
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
}
