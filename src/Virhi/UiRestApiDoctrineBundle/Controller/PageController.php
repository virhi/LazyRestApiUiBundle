<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 25/10/2014
 * Time: 16:32
 */

namespace Virhi\UiRestApiDoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function menuAction($current)
    {
        $svc  = $this->get('virhi_ui_rest_api_doctrine.service.menu');
        $menu = $svc->getMenu();
        return $this->render('VirhiUiRestApiDoctrineBundle:Menu:left_menu.html.twig', array('menu' => $menu));
    }
} 