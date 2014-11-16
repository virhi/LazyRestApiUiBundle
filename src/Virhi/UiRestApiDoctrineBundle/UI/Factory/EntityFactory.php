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
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\EmbedField;
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\EmbedEntity;

class EntityFactory 
{
    static public function build(ObjectStructure $objectStructure, $rowEntity)
    {
        $fields = array();
        $embedFields = array();
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


        foreach ($rowEntity['embeds'] as $embedName => $embeds) {

            var_dump($embedName);
            var_dump($embeds);

            $embedEntities = array();

            foreach ($embeds as $rawEmbedEntity) {
                $embedEntities[] = self::build();
            }

            /*
            foreach ($embeds as $embedFields) {
                foreach ($embedFields['value'] as $rawEmbedEntity) {
                    $embedEntity = new EmbedEntity($embedFields['identifier'], $embedFields['name'], $rawEmbedEntity['name']);
                    $embedEntities[$embedName] = $embedEntity;
                }
            }

            $embedField = new EmbedField($embedName, $embedName, $embedEntities);
            */
            $embedFields[] = $embedEntities;

        }

        $entity = new Entity($objectStructure->getName(), implode('_', $id), $fields, $embedFields);
        return $entity;
    }
} 