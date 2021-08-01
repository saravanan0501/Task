<?php

namespace Task\Listing\Api;

interface ItemRepositoryInterface
{
    /**
     * @return \Task\Listing\Api\Data\ItemInterface[]
     */
    public function getList();
}
