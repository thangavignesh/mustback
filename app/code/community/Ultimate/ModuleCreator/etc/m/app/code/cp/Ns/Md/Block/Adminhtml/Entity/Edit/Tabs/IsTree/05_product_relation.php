		$this->addTab('products', array(
			'label' => Mage::helper('{{module}}')->__('Associated Products'),
			'content'   => $this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_edit_tab_product','{{entity}}.product.grid')->toHtml(),
		));
