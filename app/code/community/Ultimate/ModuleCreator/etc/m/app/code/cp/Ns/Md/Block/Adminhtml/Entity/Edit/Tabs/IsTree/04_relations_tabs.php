		$this->addTab('{{siblings}}', array(
			'label' => Mage::helper('{{module}}')->__('{{SiblingsLabel}}'),
			'content'   => $this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_edit_tab_{{sibling}}','{{entity}}.{{sibling}}.grid')->toHtml(),
		));
