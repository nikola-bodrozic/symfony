<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SretniController extends Controller
{
    /**
     *
     * @Route("/sretni/broj/{slug}")
     */
    public function brojAction($slug)
    {
        return $this->render( 
            'sretni/broj.html.twig', 
            array('number' => $slug)
        );
    }
}