<?php 
{{License}}
/**
 * {{EntityLabel}} list block
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_{{Entity}}_List extends Mage_Core_Block_Template{
	/**
	 * initialize
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
 	public function __construct(){
		parent::__construct();
 		${{entities}} = Mage::getResourceModel('{{module}}/{{entity}}_collection')
 						->addStoreFilter(Mage::app()->getStore())
