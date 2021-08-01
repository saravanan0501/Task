<?php

namespace Task\Listing\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Task\Listing\Model\ItemFactory;
use Magento\Framework\Console\Cli;

class AddItem extends Command
{
    const INPUT_KEY_SKU = 'SKU';
    const INPUT_KEY_VENDORNUMBER = 'Vendor Number';
    const INPUT_KEY_VENDORNOTE = 'Vendor Note';

    private $itemFactory;

    public function __construct(ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('task:item:add')
            ->addArgument(
                self::INPUT_KEY_SKU,
                InputArgument::REQUIRED,
                'SKU'
            )->addArgument(
                self::INPUT_KEY_VENDORNUMBER,
                InputArgument::REQUIRED,
                'Vendor Number'
            )->addArgument(
                self::INPUT_KEY_VENDORNOTE,
                InputArgument::OPTIONAL,
                'Vendor Note'
            );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $this->itemFactory->create();
        $item->setSKU($input->getArgument(self::INPUT_KEY_SKU));
        $item->setVendorNumber($input->getArgument(self::INPUT_KEY_VENDORNUMBER));
        $item->setVendorNote($input->getArgument(self::INPUT_KEY_VENDORNOTE));
        $item->setIsObjectNew(true);
        $item->save();
        return Cli::RETURN_SUCCESS;
    }
}
