<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 26/10/2014
 * Time: 11:54
 */

namespace Virhi\LazyRestApiUiBundle\UI\Filter;


class EntityFilter 
{
    protected $entityName;
    protected $id;

    function __construct($entityName, $id)
    {
        $this->entityName = $entityName;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}