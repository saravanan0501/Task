<?php

namespace Task\Listing\Api\Data;

interface ItemInterface
{
    /**
     * @return varchar
     */
    public function getSKU();

    /**
     * @return varchar
     */
    public function getVendorNumber();
    /**
     * @return string|null
     */
    public function getVendorNote();
    /**
     * @return datetime
     */
    public function getCreatedAt();
    /**
     * @return varchar
     */
    public function getUpdatedAt();
}

