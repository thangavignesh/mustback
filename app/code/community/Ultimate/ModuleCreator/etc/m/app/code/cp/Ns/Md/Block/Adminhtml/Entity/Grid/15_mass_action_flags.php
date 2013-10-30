		$this->getMassactionBlock()->addItem('{{attributeCode}}', array(
			'label'=> Mage::helper('{{module}}')->__('Change {{attributeLabel}}'),
			'url'  => $this->getUrl('*/*/mass{{AttributeMagicCode}}', array('_current'=>true)),
			'additional' => array(
				'flag_{{attributeCode}}' => array(
						'name' => 'flag_{{attributeCode}}',
						'type' => 'select',
						'class' => 'required-entry',
						'label' => Mage::helper('{{module}}')->__('{{attributeLabel}}'),
						'values' => array(
								'1' => Mage::helper('{{module}}')->__('Yes'),
								'0' => Mage::helper('{{module}}')->__('No'),
						)
				)
			)
		));
