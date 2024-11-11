<?php

namespace Rasel\CustomModule\Block;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Rasel\CustomModule\Model\ResourceModel\Item\Collection;
use Rasel\CustomModule\Model\ResourceModel\Item\CollectionFactory;

class LayoutProcessorRegion implements LayoutProcessorInterface
{
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function getData()
    {
        return $this->collectionFactory->create()->getItems();
    }

    public function toOptionArray(): array
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

        
        return $option; 
    }

    public function process($jsLayout)
    {
        $attributeCodeSelect = 'custom_region';
        $selectConfiguration = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'shippingAddress.extension_attributes',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
            ],
            'dataScope' => 'shippingAddress.extension_attributes' . '.' . $attributeCodeSelect,
            'label' => 'Region',
            'provider' => 'checkoutProvider',
            'sortOrder' => 1010,
            'validation' => [
            ],
            'options' => [
                    
            ],
            'visible' => true
        ];

        if (isset($selectConfiguration)) {
            $selectConfiguration['options'] = $this->toOptionArray();
        }

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
        ['children']['shippingAddress']['children']['shipping-address-fieldset']
        ['children'][$attributeCodeSelect] = $selectConfiguration;


        return $jsLayout;
    }
}
