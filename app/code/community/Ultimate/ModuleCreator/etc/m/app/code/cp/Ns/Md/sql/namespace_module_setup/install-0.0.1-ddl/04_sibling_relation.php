$table = $this->getConnection()
	->newTable($this->getTable('{{module}}/{{entity}}_{{sibling}}'))
	->addColumn('rel_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Relation ID')
	->addColumn('{{entity}}_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned'  => true,
		'nullable'  => false,
		'default'   => '0',
	), '{{EntityLabel}} ID')
	->addColumn('{{sibling}}_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned'  => true,
		'nullable'  => false,
		'default'   => '0',
	), '{{SiblingLabel}} ID')
	->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'nullable'  => false,
		'default'   => '0',
	), 'Position')
	->addForeignKey($this->getFkName('{{module}}/{{entity}}_{{sibling}}', '{{entity}}_id', '{{module}}/{{entity}}', 'entity_id'), '{{entity}}_id', $this->getTable('{{module}}/{{entity}}'), 'entity_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
	->addForeignKey($this->getFkName('{{module}}/{{entity}}_{{sibling}}', '{{sibling}}_id', '{{module}}/{{entity}}', 'entity_id'),	'{{sibling}}_id', $this->getTable('{{module}}/{{sibling}}'), 'entity_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
	->setComment('{{EntityLabel}} to {{SiblingLabel}} Linkage Table');
$this->getConnection()->createTable($table);
