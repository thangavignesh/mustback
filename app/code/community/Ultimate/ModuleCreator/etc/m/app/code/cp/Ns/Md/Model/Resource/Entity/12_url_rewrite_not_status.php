	/**
	 * check url key
	 * @access public
	 * @param string $urlKey
	 * @return mixed
	 * {{qwertyuiop}}
	 */
	public function checkUrlKey($urlKey, $storeId){
		$stores = array(Mage_Core_Model_App::ADMIN_STORE_ID, $storeId);
		$select = $this->_initCheckUrlKeySelect($urlKey, $stores);
		$select->reset(Zend_Db_Select::COLUMNS)
			->columns('e.entity_id')
			->limit(1);
		
		return $this->_getReadAdapter()->fetchOne($select);
	}
	/**
	 * init the check select
	 * @access protected
	 * @param string $urlKey
	 * @param array $store
	 * @return Zend_Db_Select
	 * {{qwertyuiop}}
	 */
	protected function _initCheckUrlKeySelect($urlKey, $store){
		$select = $this->_getReadAdapter()->select()
			->from(array('e' => $this->getMainTable()))
			->join(
				array('es' => $this->getTable('{{module}}/{{entity}}_store')),
				'e.entity_id = es.{{entity}}_id',
				array())
			->where('e.url_key = ?', $urlKey)
			->where('es.store_id IN (?)', $store);
		return $select;
	}
	/**
	 * Check for unique URL key
	 * @access public
	 * @param Mage_Core_Model_Abstract $object
	 * @return bool
	 * {{qwertyuiop}}
	 */
	public function getIsUniqueUrlKey(Mage_Core_Model_Abstract $object){
		if (Mage::app()->isSingleStoreMode() || !$object->hasStores()) {
			$stores = array(Mage_Core_Model_App::ADMIN_STORE_ID);
		} 
		else {
			$stores = (array)$object->getData('stores');
		}
		$select = $this->_initCheckUrlKeySelect($object->getData('url_key'), $stores);
		if ($object->getId()) {
			$select->where('e.entity_id <> ?', $object->getId());
		}
		if ($this->_getWriteAdapter()->fetchRow($select)) {
			return false;
		}
		return true;
	}
	/**
	 * Check if the URL key is numeric
	 * @access public
	 * @param Mage_Core_Model_Abstract $object
	 * @return bool
	 * {{qwertyuiop}}
	 */
	protected function isNumericUrlKey(Mage_Core_Model_Abstract $object){
		return preg_match('/^[0-9]+$/', $object->getData('url_key'));
	}
	/**
	 * Checkif the URL key is valid
	 * @access public
	 * @param Mage_Core_Model_Abstract $object
	 * @return bool
	 * {{qwertyuiop}}
	 */
	protected function isValidUrlKey(Mage_Core_Model_Abstract $object){
		return preg_match('/^[a-z0-9][a-z0-9_\/-]+(\.[a-z0-9_-]+)?$/', $object->getData('url_key'));
	}