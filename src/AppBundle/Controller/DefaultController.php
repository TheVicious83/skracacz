<?php

namespace AppBundle\Controller;

use AppBundle\Entity\cos;
use Doctrine\DBAL\Types\StringType;
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
        $form = $this->createFormBuilder($cos)
        ->add('url', TextType::class)
        ->add('zapisz', SubmitType::class, array('label' => 'Dodaj link'))
        ->getForm();

        $form->handleRequest($request);
        $ok = "Jeszcze nie dodalem obiektu";

        if ($form->isSubmitted()) {
            $url = $form->get('url')->getData();
            $db = $this->getDoctrine()->getManager();
            $db->persist($cos);
            $db->flush();

            $ok = 'OKI, stworzylem obiekt';
        }

        return $this->render('default/new.html.twig', [
            'formularz' => $form->createView(),
            'ok' => $ok
        ]);
    }
}
