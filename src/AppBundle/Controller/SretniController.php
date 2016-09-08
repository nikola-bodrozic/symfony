<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SretniController extends Controller
{
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