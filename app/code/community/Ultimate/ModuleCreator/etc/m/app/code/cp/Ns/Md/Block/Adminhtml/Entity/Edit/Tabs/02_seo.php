		$this->addTab('form_meta_{{entity}}', array(
			'label'		=> Mage::helper('{{module}}')->__('Meta'),
			'title'		=> Mage::helper('{{module}}')->__('Meta'),
			'content' 	=> $this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_edit_tab_meta')->toHtml(),
		));
