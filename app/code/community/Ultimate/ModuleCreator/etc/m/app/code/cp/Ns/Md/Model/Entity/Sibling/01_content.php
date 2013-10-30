<?php 
{{License}}
/**
 * {{EntityLabel}} {{siblingLabel}} model
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Model_{{Entity}}_{{Sibling}} extends Mage_Core_Model_Abstract{
	/**
	 * Initialize resource
	 * @access protected
	 * @return void
	 * {{qwertyuiop}}
	 */
	protected function _construct(){
		$this->_init('{{module}}/{{entity}}_{{sibling}}');
	}
	/**
	 * Save data for {{entity}} - {{sibling}} relation
	 * @access public
	 * @param  {{Namespace}}_{{Module}}_Model_{{Entity}} ${{entity}}
	 * @return {{Namespace}}_{{Module}}_Model_{{Entity}}_{{Sibling}}
	 * {{qwertyuiop}}
	 */
	public function save{{Entity}}Relation(${{entity}}){
		$data = ${{entity}}->get{{Siblings}}Data();
		if (!is_null($data)) {
			$this->_getResource()->save{{Entity}}Relation(${{entity}}, $data);
		}
		return $this;
	}
	/**
	 * get {{siblings}} for {{entity}}
	 * @access public
	 * @param {{Namespace}}_{{Module}}_Model_{{Entity}} ${{entity}}
	 * @return {{Namespace}}_{{Module}}_Model_Resource_{{Entity}}_{{Sibling}}_Collection
	 * {{qwertyuiop}}
	 */
	public function get{{Siblings}}Collection(${{entity}}){
		$collection = Mage::getResourceModel('{{module}}/{{entity}}_{{sibling}}_collection')
			->add{{Entity}}Filter(${{entity}});
		return $collection;
	}
}