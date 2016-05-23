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
        return $this->render(':products:insert.html.twig', [
            'form'  => $form->createView(),
            'title' => 'New Product',
        ]);
    }


}
