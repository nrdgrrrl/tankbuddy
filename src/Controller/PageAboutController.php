<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageAboutController extends Controller
{
    /**
     * @Route("/about", name="page_about")
     */
    public function index()
    {
        return $this->render('page_about/index.html.twig', [
            'controller_name' => 'PageAboutController',
        ]);
    }
}
