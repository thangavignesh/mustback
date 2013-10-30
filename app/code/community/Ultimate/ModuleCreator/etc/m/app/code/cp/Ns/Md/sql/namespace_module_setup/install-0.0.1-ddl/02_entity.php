$table = $this->getConnection()
	->newTable($this->getTable('{{module}}/{{entity}}'))
	->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity'  => true,
		'nullable'  => false,
		'primary'   => true,
		), '{{EntityLabel}} ID')
{{attributeDdlSql}}
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		), '{{EntityLabel}} Creation Time')
	->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		), '{{EntityLabel}} Modification Time'){{fksDdl}}
	->setComment('{{EntityLabel}} Table');
$this->getConnection()->createTable($table);

$table = $this->getConnection()
	->newTable($this->getTable('{{module}}/{{entity}}_store'))
	->addColumn('{{entity}}_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
		'nullable'  => false,
		'primary'   => true,
		), '{{EntityLabel}} ID')
	->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
		'unsigned'  => true,
		'nullable'  => false,
		'primary'   => true,
		), 'Store ID')
	->addIndex($this->getIdxName('{{module}}/{{entity}}_store', array('store_id')), array('store_id'))
	->addForeignKey($this->getFkName('{{module}}/{{entity}}_store', '{{entity}}_id', '{{module}}/{{entity}}', 'entity_id'), '{{entity}}_id', $this->getTable('{{module}}/{{entity}}'), 'entity_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addForeignKey($this->getFkName('{{module}}/{{entity}}_store', 'store_id', 'core/store', 'store_id'), 'store_id', $this->getTable('core/store'), 'store_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
	->setComment('{{EntitiesLabel}} To Store Linkage Table');
$this->getConnection()->createTable($table);
