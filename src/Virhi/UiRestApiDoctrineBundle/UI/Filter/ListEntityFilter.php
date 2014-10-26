<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 25/10/2014
 * Time: 18:29
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\Filter;


class ListEntityFilter 
{
    protected $entityName;

    /**
     * @param mixed $entityName
     */
    public function setEntityName($entityName)
    {
        $this->entityName = $entityName;
    }


    /**
     * @return mixed
     */
    public function getEntityName()
    {
        return $this->entityName;
    }


} 