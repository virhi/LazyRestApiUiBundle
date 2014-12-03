<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 30/11/2014
 * Time: 11:41
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\Filter;


class EditEntityFilter 
{
    protected $entityName;
    protected $entityId;
    protected $inputs;

    function __construct($entityName, $inputs, $entityId = null)
    {
        $this->entityName = $entityName;
        $this->inputs = $inputs;
        $this->entityId = $entityId;
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
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @return null
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

}