<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 26/12/14
 * Time: 14:24
 */

namespace Virhi\UiRestApiDoctrineBundle\Controller;

use Virhi\AdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    public function menuAction($current)
    {
        $svc  = $this->get('virhi_ui_rest_api_doctrine.service.menu');
        $menu = $svc->getMenu();
        return $this->render('VirhiUiRestApiDoctrineBundle:Menu:left_menu.html.twig', array('menu' => $menu));
    }
} 