<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\CategoryType;
use AppBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CategoryController extends Controller
{

    /**
     * @Route("/category_insert/{id}", name="app_category_insert")
     * @Security("has_role('ROLE_ADMIN')")
     */

    public function categoryAction(Request $request)
    {
    $m = $this->getDoctrine()->getManager();
    $cr = $m->getRepository('AppBundle:Category');
    $categories = $cr->queryAllCategories();
    $response = $this->render(':category:insert.html.twig',
        [
           'categories' => $categories
        ]);
    return $response;
    }

    /**
     * @Route("/category_insert", name="app_category_insert")
     * @Security("has_role('ROLE_ADMIN')")
     */

    public function insertAction(Request $request)
    {

        $c = new Category();
        $form = $this->createForm(CategoryType::class, $c);

        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $m = $this->getDoctrine()->getManager();
                $m->persist($c);
                $m->flush();
                $this->addFlash('messages', 'Categoria añadida');
                return $this->redirectToRoute('app_category_insert');
            }
        }
        return $this->render(':category:insert.html.twig', [
            'form'  => $form->createView(),
            'title' => 'New Category',
        ]);
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
