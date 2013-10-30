	/**
	 * save {{entity}} - product relation
	 * @access public
	 * @param Varien_Event_Observer $observer
	 * @return {{Namespace}}_{{Module}}_Model_Adminhtml_Observer
	 * {{qwertyuiop}}
	 */
	public function save{{Entity}}Data($observer){
		$post = Mage::app()->getRequest()->getPost('{{entity}}_ids', -1);
		if ($post != '-1') {
			$post = explode(',', $post);
			$post = array_unique($post); 
			$product = $observer->getEvent()->getProduct();
			Mage::getResourceSingleton('{{module}}/{{entity}}_product')->saveProductRelation($product, $post);
		}
		return $this;
	}
