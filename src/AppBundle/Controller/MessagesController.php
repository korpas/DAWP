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
    public function removeAction(Messages $Messages)
    {
        $m = $this->getDoctrine()->getManager();
        $m->remove($Messages);
        $m->flush();
        $this->addFlash('messages', 'Eliminado');
        return $this->redirectToRoute('app_messages_index');
    }
    /**
     * @Route("/messagesin/user/{username}", name="app_messages_byUser2")
     */
    public function inAction(User $user, Request $request){

        $m = $this->getDoctrine()->getManager();
        $mesRepo = $m->getRepository('AppBundle:Messages');
        $query = $mesRepo->queryMessagesByUserId2($user->getId());
        $paginator = $this->get('knp_paginator');
        $messages = $paginator->paginate($query, $request->query->getInt('page', 1), Messages::PAGINATION_ITEMS);
        return $this->render(':messages:in.html.twig', [
            'Messages'  => $messages,
            'user'     => '@' . $user->getUsername(),
        ]);

    }

    /**
     * @Route("/messagesout/user/{username}", name="app_messages_byUser")
     */
    public function outAction(User $user, Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $mesRepo = $m->getRepository('AppBundle:Messages');
        $query = $mesRepo->queryMessagesByUserId($user->getId());
        $paginator = $this->get('knp_paginator');
        $messages = $paginator->paginate($query, $request->query->getInt('page', 1), Messages::PAGINATION_ITEMS);
        return $this->render(':messages:out.html.twig', [
            'Messages'  => $messages,
            'user'     => '@' . $user->getUsername(),
        ]);

    }


}
