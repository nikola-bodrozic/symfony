<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SretniController extends Controller
{
    /**
     * @Route("/sretni/{_lang}/{month}/{year}", requirements={"_lang": "en|fr"})
     * 
     */
    public function brojAction($lang, $month, $year)
    {
        return $this->render( 
            'sretni/broj.html.twig', 
            array('number' => array($_lang, $month, $year))
        );
    }
}