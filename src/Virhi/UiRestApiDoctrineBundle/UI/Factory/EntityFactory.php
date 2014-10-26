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
        $entity = new Entity($objectStructure->getName());
        foreach ($rowEntity as $fieldName => $fieldValue) {
            if ('_links' !== $fieldName) {
                $field = new Fields($fieldName, $fieldName);
                $field->setValue($fieldValue);
                $entity->addFields($field);
            }
        }
        return $entity;
    }
} 