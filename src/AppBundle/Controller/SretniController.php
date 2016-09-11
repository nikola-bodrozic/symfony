<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SretniController extends Controller
{


    /**
     * @Route("sretni")
     * @Route("sretni/index")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        $session->set('param-name', 'param vrednost');

        return $this->render('sretni/index.html.twig');

        // redirect to the "homepage" route
        // return $this->redirectToRoute('homepage');

        // do a permanent - 301 redirect
        // return $this->redirectToRoute('homepage', array(), 301);

        // redirect to a route with parameters
        // return $this->redirectToRoute('blog_show', array('slug' => 'my-page'));

        // redirect externally
        // return $this->redirect('http://symfony.com/doc');


    }

    /**
    * @Route("sretni/odgovor")
    */
    public function odgovorAction(){
        $response = new Response(json_encode(array('name' => 'mike')));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route(
     *     "/sretni/{_locale}/{year}/{title}",
     *     requirements={
     *         "_locale": "en|fr|es",
     *         "year": "\d+"
     *     }
     * )
     */
    public function brojAction($_locale, $year, $title, Request $request)
    {
        $session = $request->getSession();
        return $this->render( 
            'sretni/broj.html.twig', 
            array('number' => array($_locale, $year, $title, $session->get('param-name')))
        );
    }
}