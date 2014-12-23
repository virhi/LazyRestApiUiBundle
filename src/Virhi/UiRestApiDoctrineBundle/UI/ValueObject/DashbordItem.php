<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 23/12/14
 * Time: 19:46
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\ValueObject;

use \ArrayObject;

class DashbordItem 
{
    protected $objectStructure;

    /**
     * @var ArrayObject
     */
    protected $objects;

    function __construct(ObjectStructure $objectStructure, $objects)
    {
        $this->objects         = new ArrayObject();
        $this->objectStructure = $objectStructure;

        foreach ($objects as $object) {
            $this->addObject($object);
        }
    }

    /**
     * @return ObjectStructure
     */
    public function getObjectStructure()
    {
        return $this->objectStructure;
    }

    /**
     * @return ArrayObject
     */
    public function getObjects()
    {
        return $this->objects;
    }

    public function addObject(ObjectStructure $value)
    {
        $this->objects->append($value);
    }
}