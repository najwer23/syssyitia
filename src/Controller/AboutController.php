<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="about")
     */ 
    public function about()
    {
        return $this->render('firstPageAbout/firstPageAbout.html.twig', [ 
            'namePage' => 'Syssitia App - about',
            'nav' => '1',
            'footer' => '1',
        ]);
    }
}
