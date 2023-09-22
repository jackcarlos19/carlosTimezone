<?php
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('carlos_timezone/user_timezone'))
    ->addColumn('session_id', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [
        'primary'  => true,
        'nullable' => false,
    ], 'Session ID')
    ->addColumn('timezone', Varien_Db_Ddl_Table::TYPE_TEXT, 50, [
        'nullable' => false,
    ], 'Timezone')
    ->setComment('User Timezone Table');

$installer->getConnection()->createTable($table);

$installer->endSetup();