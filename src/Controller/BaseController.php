<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @param Environment $twigEnvironment
     * @return Response
     */
    public function homepage(Environment $twigEnvironment)
    {
        return $this->render('base.html.twig');
    }
}