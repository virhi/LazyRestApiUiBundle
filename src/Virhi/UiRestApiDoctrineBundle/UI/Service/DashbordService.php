<?php
/**
 * Created by PhpStorm.
 * User: virhi
 * Date: 23/12/14
 * Time: 19:50
 */

namespace Virhi\UiRestApiDoctrineBundle\UI\Service;

use Virhi\UiRestApiDoctrineBundle\UI\Filter\ListEntityFilter;
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\Dashbord;
use Virhi\UiRestApiDoctrineBundle\UI\ValueObject\DashbordItem;

class DashbordService 
{
    /**
     * @var ObjectStructureService
     */
    protected $objectStructureService;

    /**
     * @var EntityService
     */
    protected $entityService;

    function __construct(EntityService $entityService, ObjectStructureService $objectStructureService)
    {
        $this->entityService = $entityService;
        $this->objectStructureService = $objectStructureService;
    }

    public function getDashbord()
    {
        $listObjectStructure = $this->objectStructureService->getAllObjectStructure();
        $dashbord = new Dashbord();

        foreach ($listObjectStructure as $objectStructure) {

            $filter = new ListEntityFilter();
            $filter->setEntityName($objectStructure->getName());
            $filter->setLimit('0:5');

            $dashbordItem = new DashbordItem($objectStructure, $this->entityService->getList($filter));
            $dashbord->addItem($dashbordItem);
        }
        return $dashbord;
    }
}