<?php

namespace Rasel\CustomModule\Api;

interface RegionRepositoryInterface
{
    /**
     * Returns Featured Brands to user
     *
     * @api
     * @param No params.
     * @return string
     */
    public function getList();

}