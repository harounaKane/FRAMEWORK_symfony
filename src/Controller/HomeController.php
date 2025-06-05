<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home_index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();

        return $this->render('home/index.html.twig', [
            "articles" => $articles
        ]);
    }

    #[Route("/home/{id}/sow", name: "app_home_sow")]
    public function sow(Article $art){

        return $this->render('home/sow.html.twig', ["article" => $art]);;
    }
}
