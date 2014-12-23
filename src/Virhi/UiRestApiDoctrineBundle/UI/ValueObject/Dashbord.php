<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 23/12/14
 * Time: 19:43
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\ValueObject;

use \ArrayObject;

class Dashbord 
{
    /**
     * @var ArrayObject
     */
    protected $items;

    function __construct()
    {
        $this->items = new ArrayObject();
    }

    /**
     * @return ArrayObject
     */
    public function getItems()
    {
        return $this->items;
    }

    public function addItem(DashbordItem $val)
    {
        $this->items->offsetSet($val->getObjectStructure()->getName(), $val);
    }

}