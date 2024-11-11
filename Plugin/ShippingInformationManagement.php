<?php

namespace Rasel\CustomModule\Plugin;

use Magento\Quote\Api\CartRepositoryInterface;

class ShippingInformationManagement
{
    public $cartRepository;

    public function __construct(
        CartRepositoryInterface $cartRepository
    ) {
        $this->cartRepository = $cartRepository;
    }

    public function beforeSaveAddressInformation($subject, $cartId, $addressInformation)
    {
        $quote = $this->cartRepository->getActive($cartId);
        $comment = $addressInformation->getShippingAddress()->getExtensionAttributes()->getComment();
        $custom_region = $addressInformation->getShippingAddress()->getExtensionAttributes()->getCustomRegion();
        
        $quote->setComment($comment);
        $quote->setCustomRegion($custom_region);

        $this->cartRepository->save($quote);
        
        return [$cartId, $addressInformation];
    }
}