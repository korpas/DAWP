<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\MessagesType;
use AppBundle\Entity\Messages;
use LEKORP\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;


class MessagesController extends Controller
{
    /**
     *
     *@Route(path="/messages_index/in",name="app_messages_indexIn")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexInAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $mesRep = $m->getRepository('AppBundle:Messages');
        $query = $mesRep->queryAllMessages();
        $paginator = $this->get('knp_paginator');
        $messages = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            Messages::PAGINATION_ITEMS,
            [
                'wrap-queries' => true,
            ]
        );
        $response = $this->render(':messages:in.html.twig', [
            'messages' => $messages,
            'titulo' => 'Mensajes'
        ]);
        return $response;
    }

    /**
     * indexAction
     *@Route(path="/messages_index/out",name="app_messages_indexOut")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexOutAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $mesRep = $m->getRepository('AppBundle:Messages');
        $query = $mesRep->queryAllMessages();
        $paginator = $this->get('knp_paginator');
        $messages = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            Messages::PAGINATION_ITEMS,
            [
                'wrap-queries' => true,
            ]
        );
        $response = $this->render(':messages:out.html.twig', [
            'messages' => $messages,
            'titulo' => 'Mensajes'
        ]);
        return $response;
    }

    /**
     * @Route("/messages_insert", name="app_messages_insert")
     */
    public function insertAction(Request $request)
    {
        $p = new Messages();



        $form = $this->createForm(MessagesType::class, $p);

        if ($request->getMethod() == Request::METHOD_POST) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $m = $this->getDoctrine()->getManager();
                $mesRepo = $m->getRepository('AppBundle:Messages');
                $p->setUsers($this->getUser());
                $m->persist($p);
                $m->flush();
                return $this->redirectToRoute('app_products_index');
            }
        }
        return $this->render(':messages:insert.html.twig', [
            'form'  => $form->createView(),
            'title' => 'New Product',
        ]);
    }

    /**
     *
     * @Route("/message_remove/{id}", name="app_message_remove")
     * @ParamConverter(name="Messages", class="AppBundle:Messages")
     */
    public function removeAction(Messages $messages)
    {
        $m = $this->getDoctrine()->getManager();
        $m->remove($messages);
        $m->flush();
        $this->addFlash('messages', 'Eliminado');
        return $this->redirectToRoute('app_messages_index');
    }
    /**
     * @Route("/messagesin/user/", name="app_messages_byUser2")
     */

}
