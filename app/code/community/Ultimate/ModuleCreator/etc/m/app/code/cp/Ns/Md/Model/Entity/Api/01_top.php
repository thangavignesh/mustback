<?php
{{License}}
class {{Namespace}}_{{Module}}_Model_{{Entity}}_Api extends Mage_Api_Model_Resource_Abstract{
	/**
	 * init {{entityLabel}}
	 * @access protected
	 * @param ${{entity}}Id
	 * @return {{Namespace}}_{{Module}}_Model_{{Entity}}
	 * {{qwertyuiop}}
	 */
	protected function _init{{Entity}}(${{entity}}Id){
		${{entity}} = Mage::getModel('{{module}}/{{entity}}')->load(${{entity}}Id);
		if (!${{entity}}->getId()) {
			$this->_fault('{{entity}}_not_exists');
		}
		return ${{entity}};
	}
	/**
	 * get {{entities}}
	 * @access public
	 * @param mixed $filters
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function items($filters = null){
		$collection = Mage::getModel('{{module}}/{{entity}}')->getCollection();
		$apiHelper = Mage::helper('api');
		$filters = $apiHelper->parseFilters($filters);
		try {
			foreach ($filters as $field => $value) {
				$collection->addFieldToFilter($field, $value);
			}
		} 
		catch (Mage_Core_Exception $e) {
			$this->_fault('filters_invalid', $e->getMessage());
		}
		$result = array();
		foreach ($collection as ${{entity}}) {
			$result[] = ${{entity}}->getData();
		}
		return $result;
	}
	/**
	 * Add {{entity}}
	 * @access public
	 * @param array $data
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function add($data){
		try {
			if (is_null($data)){
				throw new Exception(Mage::helper('{{module}}')->__("Data cannot be null"));
			}
			${{entity}} = Mage::getModel('{{module}}/{{entity}}')
				->setData((array)$data)
				->save();
		} 
		catch (Mage_Core_Exception $e) {
			$this->_fault('data_invalid', $e->getMessage());
		} 
		catch (Exception $e) {
			$this->_fault('data_invalid', $e->getMessage());
		}
		return ${{entity}}->getId();
	}

	/**
	 * Change existing {{entity}} information
	 * @access public
	 * @param int ${{entity}}Id
	 * @param array $data
	 * @return bool
	 * {{qwertyuiop}}
	 */
	public function update(${{entity}}Id, $data){
		${{entity}} = $this->_init{{Entity}}(${{entity}}Id);
		try {
			${{entity}}->addData((array)$data);
			${{entity}}->save();
		} 
		catch (Mage_Core_Exception $e) {
			$this->_fault('save_error', $e->getMessage());
		}
		
		return true;
	}
	/**
	 * remove {{entity}}
	 * @access public
	 * @param int ${{entity}}Id
	 * @return bool
	 * {{qwertyuiop}}
	 */
	public function remove(${{entity}}Id){
		${{entity}} = $this->_init{{Entity}}(${{entity}}Id);
		try {
			${{entity}}->delete();
		} 
		catch (Mage_Core_Exception $e) {
			$this->_fault('remove_error', $e->getMessage());
		}
		return true;
	}
	/**
	 * get info
	 * @access public
	 * @param int ${{entity}}Id
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function info(${{entity}}Id){
		$result = array();
		${{entity}} = $this->_init{{Entity}}(${{entity}}Id);
		$result = ${{entity}}->getData();
	