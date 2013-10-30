	/**
	 * save {{entity}} - product relation
	 * @access public
	 * @param Varien_Event_Observer $observer
	 * @return {{Namespace}}_{{Module}}_Model_Adminhtml_Observer
	 * {{qwertyuiop}}
	 */
	public function save{{Entity}}Data($observer){
		$post = Mage::app()->getRequest()->getPost('{{entities}}', -1);
		if ($post != '-1') {
			$post = Mage::helper('adminhtml/js')->decodeGridSerializedInput($post);
			$product = Mage::registry('product');
			${{entity}}Product = Mage::getResourceSingleton('{{module}}/{{entity}}_product')->saveProductRelation($product, $post);
		}
		return $this;
	}