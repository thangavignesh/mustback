		$fieldset->addField('status', 'select', array(
			'label' => Mage::helper('{{module}}')->__('Status'),
			'name'  => 'status',
			'values'=> array(
				array(
					'value' => 1,
					'label' => Mage::helper('{{module}}')->__('Enabled'),
				),
				array(
					'value' => 0,
					'label' => Mage::helper('{{module}}')->__('Disabled'),
				),
			),
		));
