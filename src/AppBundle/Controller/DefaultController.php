<?php

namespace AppBundle\Controller;

use AppBundle\Form\MessageFormType;
use AppBundle\Form\OrderFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $orderForm = $this->createForm(OrderFormType::class);
        $messageForm = $this->createForm(MessageFormType::class);

        // replace this example code with whatever you need
        return $this->render('base.html.twig', [
            'orderForm' => $orderForm->createView(),
            'messageForm' => $messageForm->createView()
        ]);
    }
}
