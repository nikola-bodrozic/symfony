<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SretniController extends Controller
{
    /**
     * @Route("/sretni/{month}/{year}")
     * 
     */
    public function brojAction($month, $year)
    {
        return $this->render( 
            'sretni/broj.html.twig', 
            array('number' => array($month, $year))
        );
    }
}