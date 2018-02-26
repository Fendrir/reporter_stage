<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Form\SearchFormType;

use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\HttpFoundation\Request;



class RapportController extends Controller
{
    const perPage = 5;

    /**
     * @Route("/rapport")
     */
    public function AfficherRapAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('AppBundle:Article')->findAll();

        $form = $this->createForm(
            SearchFormType::class, 
            array(
                'action' => $this->generateUrl('app_rapport_afficherrap')
            )
        );
        
        $form->handlerequest($request);

        if($form->isValid() && $form->isSubmitted()){

            $data = $form->getData();
            $parameter = $data['recherche'];
            $query = $em
                ->getRepository('AppBundle:Article')
                ->getSearchTitle()
                ->setParameters(['p' => '%' . $parameter . '%']);
            $articles = $query->getResult();

        }

        // code de pagination du bundle knp_paginator

        $paginator = $this->get('knp_paginator');

        $paginatedArticles = $paginator->paginate(
            $articles,
            $request->query->getInt('page',1), self::perPage
        );


        return $this->render('AppBundle:Rapport:afficher_rap.html.twig', array(
            "articles" => $paginatedArticles,
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/page_article/{article_page}")
     */
    public function ArticlePageAction($article_page)
    {
        $em = $this->getDoctrine()->getManager();
        $article_page = $em->getRepository("AppBundle:Article")->findOneByTitle($article_page);

        return $this->render('AppBundle:Rapport:rapport_page.html.twig', array(
            "article_page" => $article_page,
        ));
    }

}
