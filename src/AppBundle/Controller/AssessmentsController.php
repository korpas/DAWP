<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\AssessmentsType;
use AppBundle\Entity\Assessments;
use Symfony\Component\HttpFoundation\Request;
class AssessmentsController extends Controller
{
    /**
     * indexAction
     *@Route(path="/assessments_index",name="app_assessments_index"
     * )
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Assessments');
        /**
         * @var Assessments $assessment
         */
        $assessment = $repository->findAll();
        return $this->render(':assessments:index.html.twig',
            [
                'assessment' => $assessment,
            ]
        );
    }

    /**
     * @Route("/assessments_insert", name="app_assessments_insert")
     */
    public function insertAction()
    {
        $assessment = new Assessments();
        $form = $this->createForm(AssessmentsType::class, $assessment);
        return $this->render(':assessments:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_assessments_do-insert')
            ]
        );
    }

    /**
     * @Route("/assessments_do-insert", name="app_assessments_do-insert")
     */
    public function doInsert(Request $request)
    {
        $assessment = new Assessments();
        $form = $this->createForm(AssessmentsType::class, $assessment);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($assessment);
            $m->flush();
            $this->addFlash('messages', 'Tu valoración será publicada');
            return $this->redirectToRoute('app_assessments_insert');
        }
        $this->addFlash('messages', 'Review your form data');
        return $this->render(':assessments:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_assessments_do-insert')
            ]
        );
    }

    /**
     * @Route("/assessments_update/{id}", name="app_assessmets_update")
     */
    public function updateAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Assessments');
        $asd = $repository->find($id);
        $form = $this->createForm(AssessmentsType::class, $asd);
        return $this->render(':assessments:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_assessments_do-update', ['id' => $id])
            ]
        );
    }
    /**
     * @Route("/assessments_do-update/{id}", name="app_assessments_do-update")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function doUpdateAction($id, Request $request)
    {
        $m          = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Assessments');
        $product      = $repository->find($id);
        $form       = $this->createForm(AssessmentsType::class, $product);
        // user is updated with incoming data
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m->flush();
            $this->addFlash('messages', 'Valoración Actualizada');
            return $this->redirectToRoute('app_products_index');
        }
        $this->addFlash('messages', 'Review your form');
        return $this->render(':assessments:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_assessments_index', ['id' => $id]),
            ]
        );
    }
    /**
     *
     * @Route("/assessments_remove/{id}", name="app_assessments_remove")
     * @ParamConverter(name="Assessments", class="AppBundle:Assessments")
     */
    public function removeAction(Assessments $assessments)
    {
        $m = $this->getDoctrine()->getManager();
        $m->remove($assessments);
        $m->flush();
        $this->addFlash('messages', 'Valoración eliminada');
        return $this->redirectToRoute('app_assessment_insert');
    }
}
