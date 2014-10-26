<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 24/10/2014
 * Time: 00:00
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\ValueObject;

class Menu 
{
    private $items;

    function __construct()
    {
        $this->items = new \ArrayObject();
    }

    public function addItem(MenuItem $item)
    {
        $this->items->append($item);
    }

    /**
     * @return \ArrayObject
     */
    public function getItems()
    {
        return $this->items;
    }

}