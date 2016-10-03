<?php

namespace AppBundle\Controller;

use AppBundle\Entity\cos;
use AppBundle\Entity\cutter;
use Doctrine\DBAL\Types\StringType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\RedirectResponse;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $cutter = new cutter();
        $form = $this->createFormBuilder($cutter)
        ->add('url', TextType::class, array('label' =>'Wpisz adres WWW'))
        ->add('prefix', TextType::class)
        ->add('zapisz', SubmitType::class, array('label' => 'Dodaj link'))
        ->getForm();

        $form->handleRequest($request);
        $ok = "Jeszcze nie dodalem obiektu";

        if ($form->isSubmitted()) {
            $url = $form->get('url')->getData();
            $db = $this->getDoctrine()->getManager();
            $db->persist($cutter);
            $db->flush();
            $prefix = $form->get('prefix')->getData();
            $db = $this->getDoctrine()->getManager();
            $db->persist($cutter);
            $db->flush();
            $ok = 'OKI, stworzylem obiekt';
        }
        return $this->render('default/new.html.twig', [
            'formularz' => $form->createView(),
            'ok' => $ok
        ]);
    }
    /**
     *
     * @Route("/d/{urlprefix}", name="cutter redirect")
     */
    public function showAction($urlprefix)
    {
        $pref = $this->getDoctrine()
            ->getRepository('AppBundle:cutter')
            ->findOneBy(array('prefix' => $urlprefix));


        if ($pref<>null)
        {
        $url = $pref->geturl();
        header("Location: //$url");
        }
        else
        {echo ('Nie ma takiej strony skracacz.dev/d/');
        echo ($urlprefix);}
        return exit();

    }
}
