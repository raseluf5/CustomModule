<?php

namespace Rasel\CustomModule\Setup;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
use Rasel\CustomModule\Model\Customer\Attribute\Source\Region;


class InstallData implements InstallDataInterface
{
    /**
     * Attribute Code of the Custom Attribute
     */
    const CUSTOM_ATTRIBUTE_CODE = 'custom_region';

    /**
     * @var EavSetup
     */
    private $eavSetup;

    /**
     * @var Config
     */
    private $eavConfig;

    /**
     * InstallData constructor.
     * @param EavSetup $eavSetup
     * @param Config $config
     */
    public function __construct(
        EavSetup $eavSetup,
        Config $config
    ) {
        $this->eavSetup = $eavSetup;
        $this->eavConfig = $config;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $this->eavSetup->addAttribute(
           AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::CUSTOM_ATTRIBUTE_CODE,
            [
                'label' => 'Region',
                'input' => 'select',
                'source' => Region::class,
                'visible' => true,
                'required' => false,
                'position' => 150,
                'sort_order' => 150,
                'system' => false
            ]
        );

        $customAttribute = $this->eavConfig->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::CUSTOM_ATTRIBUTE_CODE
        );

        $customAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']
        )->setData("is_used_for_customer_segment", true)
        ->setData("is_system", 0)
        ->setData("is_user_defined", 1)
        ->setData("is_visible", 1);

        $customAttribute->setData('is_used_in_grid',true);
        $customAttribute->setData('is_visible_in_grid',true);
        $customAttribute->setData('is_filterable_in_grid',true);

        $customAttribute->save();

        $setup->endSetup();
    }
}
