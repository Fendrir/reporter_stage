<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\HttpFoundation\Request;



class RapportController extends Controller
{
    /**
     * @Route("/rapport")
     */
    public function AfficherRapAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('AppBundle:Article')->findAll();

        $form = $this->createFormBuilder()
        ->add('recherche', Searchtype::class, array('required' => false,
        'label' => ' ',
        'attr' => array('placeholder' => 'Recherche')))
        ->getForm();
        $form->handlerequest($request);

        if($form->isValid() && $form->isSubmitted()){
            $data = $form->getData();
            $parameter = $data['recherche'];
            $query = $em->createQuery("select a from 
            AppBundle\Entity\Article as a where a.title like :p")
            ->setParameters(['p' => '%' . $parameter . '%']);
            $articles = $query->getResult();
        }

        return $this->render('AppBundle:Rapport:afficher_rap.html.twig', array(
            "articles" => $articles,
            'form' => $form->createView(),
        ));
    }

}
