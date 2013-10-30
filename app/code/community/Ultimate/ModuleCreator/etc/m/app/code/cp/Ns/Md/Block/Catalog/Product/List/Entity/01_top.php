<?php 
{{License}}
/**
 * {{EntityLabel}} list on product page block
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_Catalog_Product_List_{{Entity}} extends Mage_Catalog_Block_Product_Abstract{
	/**
	 * get the list of {{entities}}
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Model_Resource_{{Entity}}_Collection 
	 * {{qwertyuiop}}
	 */
	public function get{{Entity}}Collection(){
		if (!$this->hasData('{{entity}}_collection')){
			$product = Mage::registry('product');
			$collection = Mage::getResourceSingleton('{{module}}/{{entity}}_collection')
				->addStoreFilter(Mage::app()->getStore())

