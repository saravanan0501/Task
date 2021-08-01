<?php

namespace Task\Listing\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('task_sample_item', 'entity_id');
    }
}