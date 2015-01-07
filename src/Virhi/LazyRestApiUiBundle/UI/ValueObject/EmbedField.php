<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 12/11/2014
 * Time: 19:01
 */

namespace Virhi\LazyRestApiUiBundle\UI\ValueObject;


class EmbedField 
{
    protected $name;
    protected $entityName;
    protected $label;
    protected $entities;

    function __construct($name, $label, $entities, $entityName)
    {
        $this->entities = $entities;
        $this->label    = $label;
        $this->name     = $name;
        $this->entityName = $entityName;
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

    /**
     * @return mixed
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

}