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

    protected $id;

    protected $fields;

    protected $embedFields;

    function __construct($name, $id, array $fields = array(), array $embedFields = array())
    {
        $this->name = $name;
        $this->id = $id;

        $this->fields      = new \ArrayObject();
        $this->embedFields = new \ArrayObject();

        $this->addFields($fields);
        $this->addEmbedField($embedFields);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    private function addFields($fields)
    {
        foreach ($fields as $field) {
            $this->fields->offsetSet($field->getName(), $field);
        }
        return $this;
    }

    public function getFieldByName($name)
    {
        return $this->fields->offsetGet($name);
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

    /**
     * @return \ArrayObject
     */
    public function getEmbedFields()
    {
        return $this->embedFields;
    }

    private function addEmbedField($fields)
    {
        foreach ($fields as $field) {
            $this->embedFields->offsetSet($field->getName(), $field);
        }
        return $this;
    }
}