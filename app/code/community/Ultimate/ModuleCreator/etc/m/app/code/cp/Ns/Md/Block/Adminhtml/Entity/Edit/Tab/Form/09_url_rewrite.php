		$fieldset->addField('url_key', 'text', array(
			'label' => Mage::helper('{{module}}')->__('Url key'),
			'name'  => 'url_key',
			'required'  => true,
			'class' => 'required-entry',
			'note'	=> Mage::helper('{{module}}')->__('Relative to Website Base URL')
		));
