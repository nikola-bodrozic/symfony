<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Blogpost;
use AppBundle\Repository\BlogpostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PostController extends Controller
{
    /**
     * @Route("post/showall", name="show_all")
     */
    public function showallAction()
    {
        $postovi = $this->getDoctrine()
                        ->getRepository("AppBundle:Blogpost")
                        ->findAll();

        $this->get('logger')->info("--- poruka za log u app/logs/dev.log");

        return $this->render(
            'AppBundle:Post:showall.html.twig',
            array('postovi' => $postovi)
        );
    }


    /**
     * @Route("post/edit/{id}")
     */
    public function editAction($id, Request $request)
    {
        $blogPost = $this->getDoctrine()
            ->getRepository("AppBundle:Blogpost")
            ->find($id);



        $form = $this->createFormBuilder($blogPost)
            ->add('title', TextType::class)
            ->add('author', TextType::class)
            ->add('blogtext', TextareaType::class)
            ->add('Submit', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $title = $form['title']->getData();
            $author = $form['author']->getData();
            $blogtext = $form['blogtext']->getData();

            $em = $this->getDoctrine()->getManager();
            $blogPost = $em->getRepository('AppBundle:Blogpost')->find($id);

            $blogPost->setAuthor($blogPost->getAuthor());
            $blogPost->setTitle($blogPost->getTitle());
            $blogPost->setBlogtext($blogPost->getBlogtext());

            $em->flush();

            $this->addFlash('notice', 'izmenio red u bayu');
            return $this->redirectToRoute("show_all");
        }
        return $this->render(
            'AppBundle:Post:edit.html.twig',
            array(
                'blogpost' => $blogPost,
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("post/create")
     */
    public function createAction(Request $request)
    {
        $blogPost = new Blogpost();
        $form = $this->createFormBuilder($blogPost)
            ->add('title', TextType::class)
            ->add('author', TextType::class)
            ->add('blogtext', TextareaType::class)
            ->add('Submit', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $title = $form['title']->getData();
            $author = $form['author']->getData();
            $blogtext = $form['blogtext']->getData();

            $blogPost->setAuthor($author);
            $blogPost->setTitle($title);
            $blogPost->setBlogtext($blogtext);

            $em = $this->getDoctrine()->getManager();
            $em->persist($blogPost);
            $em->flush();

            $this->addFlash('notice', 'dodao red u bayu');
            return $this->redirectToRoute("show_all");
        }

        return $this->render(
            'AppBundle:Post:create.html.twig',
             array('form' => $form->createView())
        );
    }

    /**
     * @Route("post/showpost/{id}")
     */
    public function showpostAction($id)
    {
        $jedanRed = $this->getDoctrine()
                         ->getRepository("AppBundle:Blogpost")
                          ->find($id);
        return $this->render(
            'AppBundle:Post:showpost.html.twig',
            array('blogpost'=>$jedanRed)
        );
    }

    /**
     * @Route("post/delete/{id}")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $jedanRed = $em->getRepository('AppBundle:Blogpost')->find($id);

        $em->remove($jedanRed);
        $em->flush();

        $this->addFlash('notice', 'obrisao red iy bayu');
        return $this->redirectToRoute("show_all");

    }
}
