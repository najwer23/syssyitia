<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Posts;

class BlogController extends AbstractController
{

     public function getPosts($min,$max) 
    {
        // znajdz posty od najnowszego do najstarszego
        $query=$this->getDoctrine()
        ->getRepository(Posts::class)->createQueryBuilder('p')
        ->select('p.id', 'p.date', 'p.topic')
        ->setFirstResult($min)
        ->setMaxResults($max)
        ->orderBy('p.date', 'DESC')
        ->getQuery();
        $posts = $query->execute();
        return $posts;
    }

    public function numberOfPosts()
    {
        // liczba postow
        $qcount = $this->getDoctrine()->getManager();
        $count = $qcount->createQuery(
        ' SELECT  count(p.id)
          FROM    App\Entity\Posts p
        ')
        ->getSingleScalarResult();
        return $count;
    }

    public function page()
    {
        // ilosc wynikow na stronie 
        $page=4;
        return $page;
    }


    

    /**
    * @Route("/blog", name="blog")
    */
    public function showBlog()
    {
        //liczba postow
        $numberOfPosts=$this->numberOfPosts();

        // liczba elementow na stronie
        $page=$this->page();
        $numberOfPages=ceil($numberOfPosts/$page);

        // znajdz posty od najnowszego do najstarszego
        $posts=$this->getPosts(0,$page);

        return $this->render('firstPageBlog/firstPageBlog.html.twig', [
            'posts'=> $posts,
            'nav' => '1',
            'namePage' => 'Syssitia App - Blog',
            'numberOfPages' => $numberOfPages,
            'footer' => '1',
            'undo' => '-1',
        ]);

    }


    /**
     * @Route("/blog/page/{slug2}/post/{slug}", name="posts")
     */
    public function showPost($slug, $slug2)
    {
        // znajdz post o danym id
        $post = $this->getDoctrine()->getRepository(Posts::class)->find($slug);

        // inkrementuj odwiedziny
        $hits=$post->getHits();
        $hits=$hits+1;

        // zapisz odwiedziny do bazy danego posta
        $entityManager = $this->getDoctrine()->getManager(); 
        $post->setHits($hits);
        $entityManager->flush();

        // pozdrawiam mas?owskiego
        // link cofaj?cy z posta na stron?, poprawnie nawet po dodaniu nowego posta
        $numberOfPosts=$this->numberOfPosts();
        $page=$this->page();
        $slug2=floor((($numberOfPosts-$slug)/$page)+1);

        //pobierz info o poscie i ustaw zmienne
        $topic=$post->getTopic();
        $date=$post->getDate();        
        $path = 'firstPage/posts/post'.$slug.'.html.twig';

        return $this->render('firstPageBlog/basePostBlog.html.twig', [
               'path' => $path,
               'hits' => $hits,
               'topic' => $topic,
               'date' => $date,
               'idPost' => $slug,
               
               'namePage' => 'Syssitia App - Blog - '.$topic,
               'undo' => '2',
               'menuBlog' => $slug2,
               'nav' => '1',
               'footer' => '1',
           ]);
    }

    
    /**
     * @Route("/blog/page/{slug}", name="showPage")
     */
    public function showPage($slug)
    {
        if($slug==1)
        {
             return $this->redirectToRoute('blog', array(
            ));
        }
        
        $prevPage=$slug-1;
        $nextPage=$slug+1;

        //liczba postow
        $numberOfPosts=$this->numberOfPosts();

        // liczba elementow na stronie
        $page=$this->page();
        $numberOfPages=ceil($numberOfPosts/$page);
        
        // znajdz posty od najnowszego do najstarszego
        $posts=$this->getPosts(($slug-1)*$page,$page);

         return $this->render('firstPageBlog/firstPageBlog.html.twig', [
            'posts'=> $posts,
            'nav' => '1',
            'namePage' => 'Syssitia App - Blog - strona '.$slug,
            'numberOfPages' => $numberOfPages,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
            'footer' => '1',
        ]);

    }
   
}
