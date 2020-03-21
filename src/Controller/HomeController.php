<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home() {
        return $this->render(
            'home.html.twig'
        );

    }

    /**
     * @Route("/trick", name="trikpage")
     */
    public function trik() {
        return $this->render(
            'trik.html.twig'
        );

    }

}