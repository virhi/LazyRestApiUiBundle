<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 25/10/2014
 * Time: 18:17
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\Service;

use Virhi\UiRestApiDoctrineBundle\UI\Filter\ListEntityFilter;
use Virhi\UiRestApiDoctrineBundle\UI\Filter\EntityFilter;
use Virhi\UiRestApiDoctrineBundle\UI\Factory\ObjectStructureFactory;

class EntityService 
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var ObjectStructureService
     */
    protected $objectStructureService;

    function __construct($httpClient, ObjectStructureService $objectStructureService)
    {
        $this->httpClient = $httpClient;
        $this->objectStructureService = $objectStructureService;
    }

    /**
     * @param ListEntityFilter $filter
     * @return \ArrayObject
     */
    public function getList(ListEntityFilter $filter)
    {
        $res  = $this->httpClient->load('http://local.sf.dev/api/entitys/' . $filter->getEntityName());
        $list = new \ArrayObject();

        foreach ($res['_embedded']['entitys'] as $rowEntity) {
            $list->append(
                ObjectStructureFactory::build($rowEntity)
            );
        }

        return $list;
    }

    /**
     * @param EntityFilter $filter
     * @return \Virhi\UiRestApiDoctrineBundle\UI\ValueObject\Entity
     */
    public function getEntity(EntityFilter $filter)
    {
        $res = $this->httpClient->load('http://local.sf.dev/api/entity/' . $filter->getEntityName() . '/' .$filter->getId() );
        return ObjectStructureFactory::build($res);
    }
} 