<?php
namespace Rasel\CustomModule\Model;

use Rasel\CustomModule\Api\Data\RegionInterface;
use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel implements RegionInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'rasel_customer_region_data';

    /**
     * @var string
     */
    protected $_cacheTag = 'rasel_customer_region_data';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'rasel_customer_region_data';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Rasel\CustomModule\Model\ResourceModel\Item');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set Title.
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get getShortDescription.
     *
     * @return varchar
     */
    public function getShortDescription()
    {
        return $this->getData(self::SHORT_DESCRIPTION);
    }

    /**
     * Set ShortDescription.
     */
    public function setShortDescription($shortDescription)
    {
        return $this->setData(self::SHORT_DESCRIPTION, $shortDescription);
    }


    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

}