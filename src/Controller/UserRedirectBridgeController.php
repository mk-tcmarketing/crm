<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UserRedirectBridgeController extends AbstractController
{
    /**
     * @Route("/user/redirect/bridge", name="user_redirect")
     */
    public function index(UrlGeneratorInterface $urlGenerator)
    {
        return new RedirectResponse($urlGenerator->generate('dashboard'));
    }
}
