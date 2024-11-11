<?php

namespace Rasel\CustomModule\Model\ResourceModel\Item;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Rasel\CustomModule\Model\Item', 'Rasel\CustomModule\Model\ResourceModel\Item');
    }
}