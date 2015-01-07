<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 24/10/2014
 * Time: 00:23
 */

namespace Virhi\LazyRestApiUiBundle\UI\Service;

use Virhi\LazyRestApiUiBundle\UI\ValueObject;

class MenuService 
{
    /**
     * @var ObjectStructureService
     */
    protected $objectStructureService;

    function __construct(ObjectStructureService $objectStructureService)
    {
        $this->objectStructureService = $objectStructureService;
    }


    public function getMenu()
    {
        $listObjectStructure = $this->objectStructureService->getAllObjectStructure();

        $menu = new ValueObject\Menu();

        foreach ($listObjectStructure as $objectStructure) {
            $menuItem = new ValueObject\MenuItem($objectStructure->getName(), $objectStructure->getLabel());
            $menu->addItem($menuItem);
        }

        return $menu;
    }

} 