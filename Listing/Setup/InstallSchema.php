<?php

namespace Task\Listing\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('task_sample_item')
        )->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Entity id'
        )->addColumn(
            'SKU',
            Table::TYPE_VARCHAR,
            255,
            ['nullable' => false],
            'SKU'
        )->addColumn(
            'vendor_number',
            Table::TYPE_VARCHAR,
            255,
            ['nullable' => false],
            'Vendor Number'
        )->addColumn(
            'vendor_note',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Vendor Note'
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => 'CURRENT_TIMESTAMP'],
            'Created At'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['unsigned' => true, 'nullable' => false, 'default' => 'CURRENT_TIMESTAMP'],
            'Updated At'
        )->addIndex(
            $setup->getIdxName('task_sample_item', ['vendor_number']),
            ['vendor_number']
        )->setComment(
            'vendor info'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
