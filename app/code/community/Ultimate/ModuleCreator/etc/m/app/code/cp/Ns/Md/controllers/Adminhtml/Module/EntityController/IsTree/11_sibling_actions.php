	public function {{siblings}}gridAction(){
		if (!${{entity}} = $this->_init{{Entity}}()) {
			return;
		}
		$this->getResponse()->setBody(
			$this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_edit_tab_{{sibling}}', '{{entity}}.{{sibling}}.grid')->toHtml()
		);
	}
