	/**
	 * add the {{entity}} tab to products
	 * @access public
	 * @param Varien_Event_Observer $observer
	 * @return {{Namespace}}_{{Module}}_Model_Adminhtml_Observer
	 * {{qwertyuiop}}
	 */
	public function add{{Entity}}Block($observer){
		$block = $observer->getEvent()->getBlock();
		$product = Mage::registry('product');
		if ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Edit_Tabs && $this->_canAddTab($product)){
			$block->addTab('{{entities}}', array(
				'label' => Mage::helper('{{module}}')->__('{{Entities}}'),
				'url'   => Mage::helper('adminhtml')->getUrl('adminhtml/{{module}}_{{entity}}_catalog_product/{{entities}}', array('_current' => true)),
				'class' => 'ajax',
			));
		}
		return $this;
	}
