<?php
namespace Rasel\CustomModule\Model\ResourceModel;


class Item extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        $resourcePrefix = null
    ) 
    {
        parent::__construct($context, $resourcePrefix);
    }

    
    protected function _construct()
    {
        $this->_init('rasel_customer_region_data', 'id');
    }
}