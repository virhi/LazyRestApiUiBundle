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

    protected $fields;

    function __construct($name)
    {
        $this->fields = new \ArrayObject();
        $this->name = $name;
    }

    public function addFields($fields)
    {
        $this->fields->append($fields);
        return $this;
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