<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 25/10/2014
 * Time: 18:17
 */

namespace Virhi\LazyRestApiUiBundle\UI\Service;

use Virhi\LazyRestApiUiBundle\UI\Filter\ListEntityFilter;
use Virhi\LazyRestApiUiBundle\UI\Filter\EntityFilter;
use Virhi\LazyRestApiUiBundle\UI\Filter\EditEntityFilter;
use Virhi\LazyRestApiUiBundle\UI\Factory\ObjectStructureFactory;

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

    protected $apiUrl;

    function __construct(HttpClient $httpClient, ObjectStructureService $objectStructureService, $apiUrl)
    {
        $this->httpClient = $httpClient;
        $this->objectStructureService = $objectStructureService;
        $this->apiUrl = $apiUrl;
    }

    /**
     * @param ListEntityFilter $filter
     * @return \ArrayObject
     */
    public function getList(ListEntityFilter $filter)
    {
        $uri  = $this->apiUrl . 'api/entitys/' . $filter->getEntityName();

        if ($filter->getLimit() !== null) {
            $uri = $uri . '/'.$filter->getLimit();
        }

        $res  = $this->httpClient->load($uri);
        $list = new \ArrayObject();


        if ( array_key_exists('_embedded', $res)) {
            foreach ($res['_embedded']['entitys'] as $rowEntity) {
                $list->append(
                    ObjectStructureFactory::build($rowEntity)
                );
            }
        }

        return $list;
    }

    /**
     * @param EntityFilter $filter
     * @return \Virhi\LazyRestApiUiBundle\UI\ValueObject\Entity
     */
    public function getEntity(EntityFilter $filter)
    {
        $res = $this->httpClient->load($this->apiUrl . 'api/entity/' . $filter->getEntityName() . '/' .$filter->getId() );
        return ObjectStructureFactory::build($res);
    }

    public function send(EditEntityFilter $filter)
    {
        $result = null;
        if ($filter->getEntityId() !== null) {
            $result = $this->update($filter);
        } else {
            $result = $this->create($filter);
        }
        return $result;
    }

    public function delete(EntityFilter $filter)
    {
        $res = $this->httpClient->delete($this->apiUrl . 'api/remove/' . $filter->getEntityName() . '/' .$filter->getId() );
    }


    protected function update(EditEntityFilter $filter)
    {
        $url = $this->apiUrl . 'api/update/' . $filter->getEntityName() . '/' . $filter->getEntityId();
        return $this->httpClient->put($url, $filter->getInputs());
    }


    protected function create(EditEntityFilter $filter)
    {
        $url = $this->apiUrl . 'api/create/' . $filter->getEntityName();
        return $this->httpClient->post($url, $filter->getInputs());
    }
} 