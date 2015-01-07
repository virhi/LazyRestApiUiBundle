<?php

namespace Virhi\LazyRestApiUiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VirhiLazyRestApiUiBundle:Default:index.html.twig', array('name' => 'toto'));
    }
}
