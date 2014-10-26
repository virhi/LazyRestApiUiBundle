<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 26/10/2014
 * Time: 09:00
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\Factory;

use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\ObjectStructure;
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\Fields;

class ObjectStructureFactory 
{
    /**
     * @param $rawObjectStructure
     * @return ObjectStructure
     */
    static public function build($rawObjectStructure)
    {
        $objectStructure = new ObjectStructure($rawObjectStructure['name']);
        foreach($rawObjectStructure['_embedded']['collumns'] as $collumns) {
            $field = new Fields($collumns['name'], $collumns['name']);
            $field->setLength($collumns['length']);
            $field->setNullable($collumns['notnull']);
            $field->setType($collumns['type']);
            $objectStructure->addFields($field);
        }
        return $objectStructure;
    }
} 