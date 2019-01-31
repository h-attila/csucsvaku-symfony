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
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, \Swift_Mailer $mailer)
    {
        $orderForm = $this->createForm(OrderFormType::class);
        $messageForm = $this->createForm(MessageFormType::class);

        // order
        $orderForm->handleRequest($request);
        if ($orderForm->isSubmitted() && $orderForm->isValid()) {
            $orderData = $orderForm->getData();

            if (isset($orderData['name'], $orderData['email'], $orderData['deliveryAdress'], $orderData['deliveryMode']) && strlen($orderData['name']) > 5 && strlen($orderData['email']) > 5 && strlen($orderData['deliveryAdress']) > 5 && strlen($orderData['deliveryMode']) > 5) {

                $message = (new \Swift_Message())
                    ->setSubject('megrendelés visszaigazolás')
                    ->setFrom(['info@csucsvaku.hu' => '[ csucsvaku.hu - a profi fény titka ]'])
                    ->setTo($orderData['email'])
                    ->setBcc('info@csucsvaku.hu')
                    ->setBody(
                        $this->renderView('emails/orderEmailMessage.html.twig',
                            array('orderData' => $orderData)), 'text/html'
                    );

                $mailer->send($message);

                $this->addFlash('message', 'Köszönjük megrendelést, melyet e-mailben is visszaigazolunk!');
                return $this->redirect($request->getUri());

            }

            $this->addFlash('error', 'Megrendelés sikertelen, hiányosan kitöltött adatmezők miatt. Ismételje meg, vagy hívja ügyfélszolgálatunkat: 06-70-232-41114.');

            return $this->redirect($request->getUri());
        }

        // message
        $messageForm->handleRequest($request);
        if ($messageForm->isSubmitted() && $messageForm->isValid()) {
            $messageData = $messageForm->getData();

            if (isset($messageData['name'], $messageData['email'], $messageData['message']) && strlen($messageData['name']) > 5 && strlen($messageData['message']) > 5) {
                $message = (new \Swift_Message())
                    ->setSubject('üzenet a csucsvaku.hu oldalról')
                    ->setFrom(['info@csucsvaku.hu' => '[ csucsvaku.hu - a profi fény titka ]'])
                    ->setTo($messageData['email'])
                    ->setBcc('info@csucsvaku.hu')
                    ->setBody(
                        $this->renderView('emails/messageEmailMessage.html.twig',
                            array('messageData' => $messageData)), 'text/html'
                    );

                $mailer->send($message);

                $this->addFlash('message', 'Köszönjük megkeresést, hamarosan válaszolunk');
                return $this->redirect($request->getUri());
            }

            $this->addFlash('error', 'Üzenetküldés sikertelen, mindegyik mező kitöltése szükséges. Ismételje meg, vagy hívja ügyfélszolgálatunkat: 06-70-232-41114.');

            return $this->redirect($request->getUri());

        }

        // replace this example code with whatever you need
        return $this->render('base.html.twig', [
            'orderForm' => $orderForm->createView(),
            'messageForm' => $messageForm->createView()
        ]);
    }
}
