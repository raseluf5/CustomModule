<?php
namespace Rasel\CustomModule\Model;

use Rasel\CustomModule\Api\RegionRepositoryInterface;
use Rasel\CustomModule\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements RegionRepositoryInterface
{

    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }


    /**
     * Return Response for Rest api
     *
     * @api
     * @param No params.
     * @return string[]
     */
    public function getList()
    {

        $data[] = json_encode($this->collectionFactory->create()->getItems());

        return $data;
    }
}//end class