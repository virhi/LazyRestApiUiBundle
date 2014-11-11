<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 25/10/2014
 * Time: 17:50
 */

namespace Virhi\UiRestApiDoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Virhi\UiRestApiDoctrineBundle\UI\Filter\ListEntityFilter;
use Virhi\UiRestApiDoctrineBundle\UI\Filter\EntityFilter;

class EntityController extends Controller
{
    public function listAction($name)
    {
        $svc = $this->get('virhi_ui_rest_api_doctrine.service.entity');
        $filter = new ListEntityFilter();
        $filter->setEntityName($name);

        $list = $svc->getList($filter);
        return $this->render('VirhiUiRestApiDoctrineBundle:Entity:list.html.twig', array('list' => $list));
    }

    public function entityAction($name, $id)
    {
        $svc = $this->get('virhi_ui_rest_api_doctrine.service.entity');
        $filter = new EntityFilter($name, $id);
        $entity = $svc->getEntity($filter);

        return $this->render('VirhiUiRestApiDoctrineBundle:Entity:entity.html.twig', array('entity' => $entity));
    }

    public function editAction($name, $id)
    {
        $svc = $this->get('virhi_ui_rest_api_doctrine.service.entity');
        $filter = new EntityFilter($name, $id);
        $entity = $svc->getEntity($filter);

        return $this->render('VirhiUiRestApiDoctrineBundle:Entity:edit.html.twig', array('entity' => $entity));
    }
} 