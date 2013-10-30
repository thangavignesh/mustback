	/**
	 * validate before saving
	 * @access protected
	 * @param $object
	 * @return {{Namespace}}_{{Module}}_Model_Resource_{{Entity}}
	 * {{qwertyuiop}} 
	 */
	protected function _beforeSave(Mage_Core_Model_Abstract $object){
		if (!$this->getIsUniqueUrlKey($object)) {
			Mage::throwException(Mage::helper('{{module}}')->__('URL key already exists.'));
		}
		if (!$this->isValidUrlKey($object)) {
			Mage::throwException(Mage::helper('{{module}}')->__('The URL key contains capital letters or disallowed symbols.'));
		}
		if ($this->isNumericUrlKey($object)) {
			Mage::throwException(Mage::helper('{{module}}')->__('The URL key cannot consist only of numbers.'));
		}
		return parent::_beforeSave($object);
	}