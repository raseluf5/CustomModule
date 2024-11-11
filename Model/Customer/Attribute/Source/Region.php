<?php
namespace Rasel\CustomModule\Model\Customer\Attribute\Source;

use Rasel\CustomModule\Model\ResourceModel\Item\Collection;
use Rasel\CustomModule\Model\ResourceModel\Item\CollectionFactory;

class Region extends \Magento\Eav\Model\Entity\Attribute\Source\Table
{
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function getAllOptions($withEmpty = true, $defaultValues = false)
    {

        $option = array();
        foreach ($this->getData() as $data){
            $status = $data->getIsActive();
            if($status == 1){
                $label = $data->getTitle();
                $value = strtolower($data->getTitle());
                $value = str_replace(' ', '', $value);
                $value = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
                $option[] = array('label'=>$label,'value'=>$value);
            }
        }
        $first_option = array('label'=>'Select','value'=>'');
        array_unshift($option , $first_option);

        $this->_options = $option;
        return $this->_options;
    }

    public function getData()
    {
        return $this->collectionFactory->create()->getItems();
    }
}