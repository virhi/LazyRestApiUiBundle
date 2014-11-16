<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 12/11/2014
 * Time: 19:55
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\ValueObject;


class EmbedEntity 
{
    protected $name;
    protected $id;
    protected $value;

    function __construct($id, $name, $value)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getValue()
    {
        return $this->value;
    }
}