<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SretniController extends Controller
{
    /**
     * @Route("sretni")
     * @Route("sretni/index")
     */
    public function indexAction()
    {
        // redirect to the "homepage" route
        // return $this->redirectToRoute('homepage');

        // do a permanent - 301 redirect
        // return $this->redirectToRoute('homepage', array(), 301);

        // redirect to a route with parameters
        // return $this->redirectToRoute('blog_show', array('slug' => 'my-page'));

        // redirect externally
        // return $this->redirect('http://symfony.com/doc');

        return new Response(
            '<html><body>Placeholder</body></html>'
        );
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
    public function brojAction($_locale, $year, $title)
    {
        return $this->render( 
            'sretni/broj.html.twig', 
            array('number' => array($_locale, $year, $title))
        );
    }
}