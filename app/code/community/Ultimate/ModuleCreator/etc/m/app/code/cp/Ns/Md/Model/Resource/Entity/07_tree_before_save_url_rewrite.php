	/**
	 * Process {{entityLabel}} data before saving
	 * prepare path and increment children count for parent {{entitiesLabel}}
	 * @access protected
	 * @param Varien_Object $object
	 * @return {{Namespace}}_{{Module}}_Model_Resource_{{Entity}}
	 * {{qwertyuiop}}
	 */
	protected function _beforeSave(Mage_Core_Model_Abstract $object){
		if (!$object->getInitialSetupFlag()){
			if (!$this->getIsUniqueUrlKey($object)) {
				Mage::throwException(Mage::helper('{{module}}')->__('URL key already exists.'));
			}
			if (!$this->isValidUrlKey($object)) {
				Mage::throwException(Mage::helper('{{module}}')->__('The URL key contains capital letters or disallowed symbols.'));
			}
			if ($this->isNumericUrlKey($object)) {
				Mage::throwException(Mage::helper('{{module}}')->__('The URL key cannot consist only of numbers.'));
			}
		}
		parent::_beforeSave($object);
		if (!$object->getChildrenCount()) {
			$object->setChildrenCount(0);
		}
		if ($object->getLevel() === null) {
			$object->setLevel(1);
		}
		if (!$object->getId() && !$object->getInitialSetupFlag()) {
			$object->setPosition($this->_getMaxPosition($object->getPath()) + 1);
			$path  = explode('/', $object->getPath());
			$level = count($path);
			$object->setLevel($level);
			if ($level) {
				$object->setParentId($path[$level - 1]);
			}
			$object->setPath($object->getPath() . '/');
			$toUpdateChild = explode('/',$object->getPath());
			$this->_getWriteAdapter()->update(
				$this->getMainTable(),
				array('children_count'  => new Zend_Db_Expr('children_count+1')),
				array('entity_id IN(?)' => $toUpdateChild)
			);
		}
		return $this;
	}