		$this->addColumn('{{attributeCode}}', array(
			'header'=> Mage::helper('{{module}}')->__('{{attributeLabel}}'),
			'index' => '{{attributeCode}}',
			{{attributeColumnOptions}}
		));
