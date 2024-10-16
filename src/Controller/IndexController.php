<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class IndexController extends AbstractController
{
    #[Route(path:'/', name: 'app_index', locale:'en_EN')]
    #[Route(path:'/fr', name: 'app_indexFR', locale:'fr_FR')]
    
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
        ]);
    }
}