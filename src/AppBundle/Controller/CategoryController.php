<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\CategoryType;
use AppBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{

    /**
     * @Route("/category_insert", name="app_category_insert")
     */
    public function insertAction()
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        return $this->render(':category:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_category_do-insert')
            ]
        );
    }

    /**
     * @Route("/category_do-insert", name="app_category_do-insert")
     */
    public function doInsert(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($category);
            $m->flush();
            $this->addFlash('messages', 'Categoria creada');
            return $this->redirectToRoute('app_category_insert');
        }
        $this->addFlash('category', 'Review your form data');
        return $this->render(':category:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_category_do-insert')
            ]
        );


    }

    /**
     * @Route("/category_update/{id}", name="app_category_update")
     */
    public function updateAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Category');
        $asd = $repository->find($id);
        $form = $this->createForm(CategoryType::class, $asd);
        return $this->render(':category:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_category_do-update', ['id' => $id])
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
        $repository = $m->getRepository('Category');
        $category      = $repository->find($id);
        $form       = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m->flush();
            $this->addFlash('messages', 'Actualizado');
            return $this->redirectToRoute('app_category_index');
        }
        $this->addFlash('messages', 'Review your form');
        return $this->render(':category:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_category_insert', ['id' => $id]),
            ]
        );
    }
    /**
     *
     * @Route("/category_remove/{id}", name="app_category_remove")
     * @ParamConverter(name="Category", class="AppBundle:Category")
     */
    public function removeAction(Category $category)
    {
        $m = $this->getDoctrine()->getManager();
        $m->remove($category);
        $m->flush();
        $this->addFlash('messages', 'Eliminado');
        return $this->redirectToRoute('app_category_insert');
    }
}
