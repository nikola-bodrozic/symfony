<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PostController extends Controller
{
    /**
     * @Route("post/showall")
     */
    public function showallAction()
    {
        $postovi = $this->getDoctrine()
                        ->getRepository("AppBundle:Blogpost")
                        ->findAll();

        return $this->render(
            'AppBundle:Post:showall.html.twig',
            array('postovi' => $postovi)
        );
    }

    /**
     * @Route("post/edit/{slug}")
     */
    public function editAction($slug)
    {
        return $this->render(
            'AppBundle:Post:edit.html.twig',
            array('slug' => $slug)
        );
    }

    /**
     * @Route("post/update/{slug}")
     */
    public function updateAction($slug)
    {
        return $this->render('AppBundle:Post:update.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/post/{slug}")
     */
    public function postAction($slug)
    {
        return $this->render('AppBundle:Post:post.html.twig', array(
            // ...
        ));
    }

}
