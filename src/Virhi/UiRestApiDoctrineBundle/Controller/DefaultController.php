<?php

namespace Virhi\UiRestApiDoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VirhiUiRestApiDoctrineBundle:Default:index.html.twig', array('name' => 'toto'));
    }
}
