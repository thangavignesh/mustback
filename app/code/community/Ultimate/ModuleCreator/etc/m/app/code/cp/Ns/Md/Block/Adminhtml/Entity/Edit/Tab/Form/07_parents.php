		$values = Mage::getResourceModel('{{module}}/{{sibling}}_collection')->toOptionArray();
		array_unshift($values, array('label'=>'', 'value'=>''));		
		$fieldset->addField('{{sibling}}_id', 'select', array(
			'label' 	=> Mage::helper('{{module}}')->__('{{SiblingLabel}}'),
			'name'  	=> '{{sibling}}_id',
			'required'  => false,
			'values'	=> $values
		));
