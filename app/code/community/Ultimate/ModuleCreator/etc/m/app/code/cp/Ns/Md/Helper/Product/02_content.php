	/**
	 * get the selected {{entities}} for a product
	 * @access public
	 * @param Mage_Catalog_Model_Product $product
	 * @return array()
	 * {{qwertyuiop}}
	 */
	public function getSelected{{Entities}}(Mage_Catalog_Model_Product $product){
		if (!$product->hasSelected{{Entities}}()) {
			${{entities}} = array();
			foreach ($this->getSelected{{Entities}}Collection($product) as ${{entity}}) {
				${{entities}}[] = ${{entity}};
			}
			$product->setSelected{{Entities}}(${{entities}});
		}
		return $product->getData('selected_{{entities}}');
	}
	/**
	 * get {{entity}} collection for a product
	 * @access public
	 * @param Mage_Catalog_Model_Product $product
	 * @return {{Namespace}}_{{Module}}_Model_Resource_{{Entity}}_Collection
	 */
	public function getSelected{{Entities}}Collection(Mage_Catalog_Model_Product $product){
		$collection = Mage::getResourceSingleton('{{module}}/{{entity}}_collection')
			->addProductFilter($product);
		return $collection;
	}
