<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 26/10/2014
 * Time: 09:04
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\Factory;

use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\ObjectStructure;
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\Entity;
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\Fields;

class EntityFactory 
{
    static public function build(ObjectStructure $objectStructure, $rowEntity)
    {
        $fields = array();
        $id     = array();

        foreach ($rowEntity['fields'] as $rawField) {
                $objectStructureField = $objectStructure->getFieldByName($rawField['name']);

                if (in_array($rawField['name'], $objectStructure->getPrimaryKey())) {
                    $id[] = $rawField['value'];
                }

                $field = new Fields($rawField['name'], $rawField['name']);
                $field->setValue($rawField['value']);
                $field->setLength($objectStructureField->getLength());
                $field->setType($objectStructureField->getType());
                $field->setNullable($objectStructureField->getNullable());
                $fields[] = $field;

        }

        $entity = new Entity($objectStructure->getName(), implode('_', $id));

        foreach ($fields as $field) {
            $entity->addFields($field);
        }

        return $entity;
    }
} 