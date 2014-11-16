<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 12/11/2014
 * Time: 19:01
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\ValueObject;


class EmbedField 
{
    protected $name;
    protected $label;
    protected $entities;

    function __construct($name, $label, $entities)
    {
        $this->entities = $entities;
        $this->label    = $label;
        $this->name     = $name;
    }


    /**
     * @return mixed
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}