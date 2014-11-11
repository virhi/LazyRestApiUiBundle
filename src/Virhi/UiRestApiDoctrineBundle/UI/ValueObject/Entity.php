<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 24/10/2014
 * Time: 00:47
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\ValueObject;


class Entity 
{
    protected $name;

    protected $id;

    protected $fields;

    function __construct($name, $id)
    {
        $this->fields = new \ArrayObject();
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    public function addFields($fields)
    {
        $this->fields->offsetSet($fields->getName(), $fields);
        return $this;
    }

    public function getFieldByName($name)
    {
        return $this->fields->offsetGet($name);
    }

    /**
     * @return \ArrayObject
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

} 