	/**
	 * get the products grid
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function productsgridAction(){
		if (!${{entity}} = $this->_init{{Entity}}()) {
			return;
		}
		$this->getResponse()->setBody(
			$this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_edit_tab_product', '{{entity}}.product.grid')->toHtml()
		);
	}
