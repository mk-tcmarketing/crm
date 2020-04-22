<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Appel;
use App\Entity\ChiffreAffaire;
use App\Entity\Devis;
use Doctrine\Persistence\ManagerRegistry;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
    */
    public function index()
    {
    	$appelRepo = $this->getDoctrine()->getRepository(Appel::class);
        $CARepo = $this->getDoctrine()->getRepository(ChiffreAffaire::class);
        $DevisRepo = $this->getDoctrine()->getRepository(Devis::class);
    	$cas = $CARepo->findAll();
        $somme = 0;
        foreach ($cas as $ca) {
            $somme += $ca->getMentant();
        }
    	$appelRepoNbr  = $appelRepo->findAll();
    	$appelRepoNbrR = $appelRepo->CountNumberOfRdvAppel();
    	$appelRepoNbrD = $DevisRepo->findAll();
    	
        return $this->render('dashboard/index.html.twig', [
            'nbrAppel'  => count($appelRepoNbr),
            'nrbAppelR' => $appelRepoNbrR,
            'nbrAppelD' => count($appelRepoNbrD),
            'ca'        => $somme
        ]);
    } 
}
