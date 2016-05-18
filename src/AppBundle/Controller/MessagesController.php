<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\MessagesType;
use AppBundle\Entity\Messages;
use Symfony\Component\HttpFoundation\Request;


class MessagesController extends Controller
{
    /**
     * indexAction
     *@Route(path="/messages_index",name="app_messages_index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Messages');
        /**
         * @var Messages $message
         */
        $message = $repository->findAll();
        return $this->render(':messages:index.html.twig',
            [
                'message' => $message,
            ]
        );
    }

    /**
     * @Route("/messages_insert", name="app_messages_insert")
     */
    public function insertAction()
    {
        $message = new Messages();
        $form = $this->createForm(MessagesType::class, $message);
        return $this->render(':messages:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_messages_do-insert')
            ]
        );
    }

    /**
     * @Route("/messages_do-insert", name="app_messages_do-insert")
     */
    public function doInsert(Request $request)
    {
        $message = new Messages();
        $form = $this->createForm(MessagesType::class, $message);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($message);
            $m->flush();
            $this->addFlash('messages', 'Tu mensaje ha sido enviado');
            return $this->redirectToRoute('app_messages_index');
        }
        $this->addFlash('messages', 'Review your form data');
        return $this->render(':messages:insert.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_messages_do-insert')
            ]
        );
    }


}
