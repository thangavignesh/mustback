		$fieldset->addField('in_rss', 'select', array(
			'label' => Mage::helper('{{module}}')->__('Show in rss'),
			'name'  => 'in_rss',
			'values'=> array(
				array(
					'value' => 1,
					'label' => Mage::helper('{{module}}')->__('Yes'),
				),
				array(
					'value' => 0,
					'label' => Mage::helper('{{module}}')->__('No'),
				),
			),
		));
