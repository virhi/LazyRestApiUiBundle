<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 24/10/2014
 * Time: 00:04
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\ValueObject;

class MenuItem 
{
    private $label;

    private $value;

    function __construct($label, $value)
    {
        $this->label = $label;
        $this->value = $value;
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
    public function getValue()
    {
        return $this->value;
    }
}