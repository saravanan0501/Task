<?php

namespace Task\Listing\Block;

use Magento\Framework\View\Element\Template;
use Task\Listing\Model\ResourceModel\Item\Collection;
use Task\Listing\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template
{
    private $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \Task\Listing\Model\Item[]
     */
    public function getItems()
    {
        return $this->collectionFactory->create()->getItems();
    }
}