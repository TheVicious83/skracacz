<?php

namespace AppBundle\Controller;

use AppBundle\Entity\cos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $cos = new cos();
        return $this->render('AppBundle:stronaglowna.html.twig', [
            'formularz' => $form
        ]);
    }

    /**
     * @Route("/dodaj", name="dodajcosia")
     */
    public function dodajcosiaAction(Request $request)
    {
        $cos = new cos();
        $form = $this->createFormBuilder($cos)
        ->add('imie', TextType::class)
        ->add('wzrost', IntegerType::class)
        ->add('ispedal', CheckboxType::class)
        ->add('zapisz', SubmitType::class, array('label' => 'Dodaj cosia'))
        ->getForm();

        $form->handleRequest($request);
        $ok = "Jeszcze nie dodalem obiektu";

        if ($form->isSubmitted()) {
            $imie = $form->get('imie')->getData();
            $wzrost = $form->get('wzrost')->getData();
            $ispedal = $form->get('ispedal')->getData();
            $cos->setImie($imie);
            $cos->setWzrost($wzrost);
            $cos->setIspedal($ispedal);
            $db = $this->getDoctrine()->getManager();
            $db->persist($cos);
            $db->flush();

            $ok = 'OKI, stworzylem obiekt';
        }

        return $this->render('AppBundle:stronaglowna.html.twig', [
            'formularz' => $form->createView(),
            'ok' => $ok
        ]);
    }
}
