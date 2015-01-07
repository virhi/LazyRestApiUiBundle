<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 26/10/2014
 * Time: 09:00
 */

namespace Virhi\LazyRestApiUiBundle\UI\Factory;

use Virhi\LazyRestApiUiBundle\UI\ValueObject\EmbedField;
use Virhi\LazyRestApiUiBundle\UI\ValueObject\ObjectStructure;
use Virhi\LazyRestApiUiBundle\UI\ValueObject\Fields;

class ObjectStructureFactory 
{
    /**
     * @param $rawObjectStructure
     * @return ObjectStructure
     */
    static public function build($rawObjectStructure)
    {
        $namespace       = explode('\\', $rawObjectStructure['name']);
        $nbName          = count($namespace) - 1;
        $objectStructure = new ObjectStructure($namespace[$nbName], $rawObjectStructure['identifier']);

        foreach($rawObjectStructure['fields'] as $collumns) {

            $field = new Fields($collumns['name'], $collumns['name']);
            $field->setLength($collumns['length']);
            $field->setNullable($collumns['notnull']);
            $field->setType($collumns['type']);
            $field->setValue($collumns['value']);

            $objectStructure->addFields($field);
        }


        foreach ($rawObjectStructure['embeds'] as $embedFieldName => $embeded) {

            foreach ($embeded as $embed) {

                $embedEntities = array();
                foreach($embed['entities'] as $rawEntity) {
                    $embedEntities[] = self::build($rawEntity);
                }
                $embedField = new EmbedField($embedFieldName, $embedFieldName, $embedEntities, $embed['entityName']);
            }
            $objectStructure->addEmbedField($embedField);
        }

        return $objectStructure;
    }
} 