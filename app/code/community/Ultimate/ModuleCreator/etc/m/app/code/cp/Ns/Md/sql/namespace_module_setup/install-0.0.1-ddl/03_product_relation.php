$table = $this->getConnection()
	->newTable($this->getTable('{{module}}/{{entity}}_product'))
	->addColumn('rel_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Category ID')
	->addColumn('{{entity}}_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned'  => true,
		'nullable'  => false,
		'default'   => '0',
	), '{{EntityLabel}} ID')
	->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned'  => true,
		'nullable'  => false,
		'default'   => '0',
	), 'Product ID')
	->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => false,
		'default'   => '0',
	), 'Position')
	->addIndex($this->getIdxName('{{module}}/{{entity}}_product', array('product_id')), array('product_id'))
	->addForeignKey($this->getFkName('{{module}}/{{entity}}_product', '{{entity}}_id', '{{module}}/{{entity}}', 'entity_id'), '{{entity}}_id', $this->getTable('{{module}}/{{entity}}'), 'entity_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addForeignKey($this->getFkName('{{module}}/{{entity}}_product', 'product_id', 'catalog/product', 'entity_id'),	'product_id', $this->getTable('catalog/product'), 'entity_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
	->setComment('{{EntityLabel}} to Product Linkage Table');
$this->getConnection()->createTable($table);
