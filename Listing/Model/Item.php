<?php

namespace Task\Listing\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected $_eventPrefix = 'task_sample_item';

    protected function _construct()
    {
        $this->_init(\Task\Listing\Model\ResourceModel\Item::class);
    }
}