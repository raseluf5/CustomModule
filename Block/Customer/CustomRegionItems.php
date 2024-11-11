<?php

namespace Rasel\CustomModule\Block\Customer;

use Magento\Framework\View\Element\Template;
use Rasel\CustomModule\Model\Customer\Attribute\Source\Region;

class CustomRegionItems extends Template
{
    protected $customRegion;

    public function __construct(
        Template\Context $context,
        Region $customRegion
    ) {
        parent::__construct($context);
        $this->customRegion = $customRegion;
    }

    
    public function getValue()
    {
        return $this->customRegion->getAllOptions();
    }
}