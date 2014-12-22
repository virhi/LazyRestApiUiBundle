<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 24/10/2014
 * Time: 00:36
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\Service;

use Virhi\UiRestApiDoctrineBundle\UI\Factory\ObjectStructureFactory;
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\ObjectStructure;
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\Fields;

class ObjectStructureService 
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    protected $apiUrl;

    function __construct($httpClient, $apiUrl)
    {
        $this->httpClient = $httpClient;
        $this->apiUrl     = $apiUrl;
    }

    public function getAllObjectStructure()
    {
        $res = $this->httpClient->load( $this->apiUrl.'api/objects');
        $list = new \ArrayObject();

        foreach ($res['_embedded']['tables'] as $table) {
            $list->append(ObjectStructureFactory::build($table));
        }

        return $list;
    }

    /**
     * @param $name
     * @return ObjectStructure
     */
    public function getObjectStructure($name)
    {
        $resStructure = $this->httpClient->load($this->apiUrl.'api/object/' . $name);
        return ObjectStructureFactory::build($resStructure);
    }


} 