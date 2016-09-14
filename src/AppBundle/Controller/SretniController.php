<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SretniController extends Controller
{


    /**
     * @Route ("sretni/redir")
     *
     */
    public function redirAction(){
        //redirect to the "homepage" route
        return $this->redirectToRoute('odgovor');

        // do a permanent - 301 redirect
        // return $this->redirectToRoute('homepage', array(), 301);

        // redirect to a route with parameters
        // return $this->redirectToRoute('blog_show', array('slug' => 'my-page'));

        // redirect externally
        // return $this->redirect('http://symfony.com/doc');
    }

    /**
     * @Route("sretni")
     * @Route("sretni/index")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        $session->set('param-name', 'param vrednost');

        return $this->render('sretni/index.html.twig');
    }

    /**
    * @Route("sretni/odgovor", name="odgovor")
    */
    public function odgovorAction(){
        dump(array("nyc", "la"));
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