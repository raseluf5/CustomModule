<?php
namespace Rasel\CustomModule\Api\Data;

/**
 * @api
 */
interface RegionInterface
{
    const ID = 'id';
    const TITLE = 'title';
    const SHORT_DESCRIPTION = 'short_description';
    const IS_ACTIVE = 'is_active';
    
    

    public function setId($id);
    public function getId();

    public function setTitle($title);
    public function getTitle();
     
    public function setShortDescription($shortDescription);
    public function getShortDescription();

    public function setIsActive($isActive);
    public function getIsActive();

    
}
