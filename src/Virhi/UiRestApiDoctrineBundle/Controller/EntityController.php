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
use Virhi\UiRestApiDoctrineBundle\UI\Filter\EditEntityFilter;
use Symfony\Component\HttpFoundation\Request;

class EntityController extends Controller
{
    public function listAction($name)
    {
        $svc = $this->get('virhi_ui_rest_api_doctrine.service.entity');
        $filter = new ListEntityFilter();
        $filter->setEntityName($name);

        $list = $svc->getList($filter);
        return $this->render('VirhiUiRestApiDoctrineBundle:Entity:list.html.twig', array('list' => $list, 'name' => $name));
    }

    public function entityAction($name, $id)
    {
        $svc = $this->get('virhi_ui_rest_api_doctrine.service.entity');
        $filter = new EntityFilter($name, $id);
        $entity = $svc->getEntity($filter);

        return $this->render('VirhiUiRestApiDoctrineBundle:Entity:entity.html.twig', array('entity' => $entity));
    }

    public function createAction($name)
    {
        $svc    = $this->get('virhi_ui_rest_api_doctrine.service.object_structure');
        $entity = $svc->getObjectStructure($name);

        $embedEntities = array();

        foreach ($entity->getEmbedFields() as $embed) {
            $svcList  = $this->get('virhi_ui_rest_api_doctrine.service.entity');
            $filter = new ListEntityFilter();
            $filter->setEntityName($embed->getEntityName());
            $embedEntities[$embed->getName()] = $svcList->getList($filter);
        }

        return $this->render('VirhiUiRestApiDoctrineBundle:Entity:edit.html.twig', array(
            'entity'        => $entity,
            'embedEntities' => $embedEntities
        ));
    }

    public function editAction($name, $id)
    {
        $svc    = $this->get('virhi_ui_rest_api_doctrine.service.entity');
        $filter = new EntityFilter($name, $id);
        $entity = $svc->getEntity($filter);

        $embedEntities = array();

        foreach ($entity->getEmbedFields() as $embed) {
            $svcList  = $this->get('virhi_ui_rest_api_doctrine.service.entity');
            $filter = new ListEntityFilter();
            $filter->setEntityName($embed->getEntityName());
            $embedEntities[$embed->getName()] = $svcList->getList($filter);
        }

        return $this->render('VirhiUiRestApiDoctrineBundle:Entity:edit.html.twig', array(
            'entity'        => $entity,
            'embedEntities' => $embedEntities
        ));
    }

    public function sendAction(Request $request, $name, $id)
    {
        $svc = $this->get('virhi_ui_rest_api_doctrine.service.entity');

        $filter = new EditEntityFilter($name, $request->request->all(), $id);
        $svc->send($filter);

        return $this->redirect($this->generateUrl('virhi_ui_rest_api_doctrine_entity_list', array('name' => $name)));
    }

    public function removeAction($name, $id)
    {
        $svc    = $this->get('virhi_ui_rest_api_doctrine.service.entity');
        $filter = new EntityFilter($name, $id);
        $svc->delete($filter);

        return $this->redirect($this->generateUrl('virhi_ui_rest_api_doctrine_entity_list', array('name' => $name)));
    }

    public function dashbordAction()
    {
        $svc  = $this->get('virhi_ui_rest_api_doctrine.service.dashbord');
        $dashbord = $svc->getDashbord();

        return $this->render('VirhiUiRestApiDoctrineBundle:Entity:dashbord.html.twig', array(
            'dashbord' => $dashbord,
        ));
    }
} 