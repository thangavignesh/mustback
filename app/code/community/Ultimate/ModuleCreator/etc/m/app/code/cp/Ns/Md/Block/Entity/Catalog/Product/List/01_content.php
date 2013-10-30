<?php 
{{License}}
/**
 * {{EntityLabel}} product list
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_{{Entity}}_Catalog_Product_List extends Mage_Core_Block_Template{
	/**
	 * get the list of products
	 * @access public
	 * @return Mage_Catalog_Model_Resource_Product_Collection
	 * {{qwertyuiop}}
	 */
	public function getProductCollection(){
		$collection = $this->get{{Entity}}()->getSelectedProductsCollection();
		$collection->addAttributeToSelect('name');
		$collection->addUrlRewrite();
		$collection->getSelect()->order('related.position');
		Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($collection);
		Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($collection);
		return $collection;
	}
	/**
	 * get current {{entity}}
	 * @access public
	 * @return {{Namespace}}_{{Module}}_Model_{{Entity}}
	 * {{qwertyuiop}}
	 */
	public function get{{Entity}}(){
		return Mage::registry('current_{{module}}_{{entity}}');
	}
}