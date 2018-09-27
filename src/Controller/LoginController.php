<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function showLogin()
    {
        return $this->render('firstPageLogin/firstPageLogin.html.twig', [ 
            'namePage' => 'Syssitia App - login',
            'nav' => '1',
            // 'footer' => '1',
        ]);
    }

   
}