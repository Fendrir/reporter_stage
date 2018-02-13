<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class RapportController extends Controller
{
    /**
     * @Route("/rapport")
     */
    public function AfficherRapAction()
    {
        return $this->render('AppBundle:Rapport:afficher_rap.html.twig', array(
            // ...
        ));
    }

}
