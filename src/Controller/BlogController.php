<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function showBlog()
    {
        return $this->render('firstPageBlog/firstPageBlog.html.twig', [ 
            'namePage' => 'Syssitia App - blog',
             
        ]);
    }
}
