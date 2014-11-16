<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 24/10/2014
 * Time: 00:47
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\ValueObject;


class ObjectStructure 
{
    /**
     * @var
     */
    protected $name;

    protected $label;

    protected $primaryKey;

    /**
     * @var \ArrayObject
     */
    protected $embedFields;

    /**
     * @var \ArrayObject
     */
    protected $fields;

    protected $id;

    function __construct($name, $primaryKey)
    {
        $this->fields      = new \ArrayObject();
        $this->embedFields = new \ArrayObject();
        $this->name        = strtolower($name);

        $this->label       = $name;
        $this->primaryKey  = $primaryKey;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->getFieldByName($this->primaryKey[0])->getValue();
    }

    public function addFields(Fields $fields)
    {
        $this->fields->offsetSet($fields->getName(), $fields);
        return $this;
    }

    public function addEmbedField(EmbedField $fields)
    {
        $this->embedFields->offsetSet($fields->getName(), $fields);
        return $this;
    }

    /**
     * @param $name
     * @return Fields
     */
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
     * @return mixed
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return \ArrayObject
     */
    public function getEmbedFields()
    {
        return $this->embedFields;
    }

}