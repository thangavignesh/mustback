	/**
	 * get the tree model
	 * @access public
	 * @return {{Namespace}}_{{Module}}_Model_Resource_{{Entity}}_Tree
	 * {{qwertyuiop}}
	 */
	public function getTreeModel(){
		return Mage::getResourceModel('{{module}}/{{entity}}_tree');
	}
	/**
	 * get tree model instance
	 * @access public
	 * @return {{Namespace}}_{{Module}}_Model_Resource_{{Entity}}_Tree
	 * {{qwertyuiop}}
	 */
	public function getTreeModelInstance(){
		if (is_null($this->_treeModel)) {
			$this->_treeModel = Mage::getResourceSingleton('{{module}}/{{entity}}_tree');
		}
		return $this->_treeModel;
	}
	/**
	 * Move {{entityLabel}}
	 * @access public
	 * @param   int $parentId new parent {{entityLabel}} id
	 * @param   int $after{{Entity}}Id {{entityLabel}} id after which we have put current {{entityLabel}}
	 * @return  {{Namespace}}_{{Module}}_Model_{{Entity}}
	 * {{qwertyuiop}}
	 */
	public function move($parentId, $after{{Entity}}Id){
		$parent = Mage::getModel('{{module}}/{{entity}}')->load($parentId);
		if (!$parent->getId()) {
			Mage::throwException(
				Mage::helper('{{module}}')->__('{{EntityLabel}} move operation is not possible: the new parent {{entityLabel}} was not found.')
			);
		}
		if (!$this->getId()) {
			Mage::throwException(
				Mage::helper('{{module}}')->__('{{EntityLabel}} move operation is not possible: the current {{entityLabel}} was not found.')
			);
		} 
		elseif ($parent->getId() == $this->getId()) {
			Mage::throwException(
				Mage::helper('{{module}}')->__('{{EntityLabel}} move operation is not possible: parent {{entityLabel}} is equal to child {{entityLabel}}.')
			);
		}
		$this->setMoved{{Entity}}Id($this->getId());
		$eventParams = array(
			$this->_eventObject => $this,
			'parent'			=> $parent,
			'{{entity}}_id'   	=> $this->getId(),
			'prev_parent_id'	=> $this->getParentId(),
			'parent_id' 		=> $parentId
		);
		$moveComplete = false;
		$this->_getResource()->beginTransaction();
		try {
			$this->getResource()->changeParent($this, $parent, $after{{Entity}}Id);
			$this->_getResource()->commit();
			$this->setAffected{{Entity}}Ids(array($this->getId(), $this->getParentId(), $parentId));
			$moveComplete = true;
		} 
		catch (Exception $e) {
			$this->_getResource()->rollBack();
			throw $e;
		}
		if ($moveComplete) {
			Mage::app()->cleanCache(array(self::CACHE_TAG));
		}
		return $this;
	}
	/**
	 * Get the parent {{entityLabel}}
	 * @access public
	 * @return  {{Namespace}}_{{Module}}_Model_{{Entity}}
	 * {{qwertyuiop}}
	 */
	public function getParent{{Entity}}(){
		if (!$this->hasData('parent_{{entity}}')) {
			$this->setData('parent_{{entity}}', Mage::getModel('{{module}}/{{entity}}')->load($this->getParentId()));
		}
		return $this->_getData('parent_{{entity}}');
	}
	/**
	 * Get the parent id
	 * @access public
	 * @return  int
	 * {{qwertyuiop}}
	 */
	public function getParentId(){
		$parentIds = $this->getParentIds();
		return intval(array_pop($parentIds));
	}
	/**
	 * Get all parent {{entitiesLabel}} ids
	 * @access public
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function getParentIds(){
		return array_diff($this->getPathIds(), array($this->getId()));
	}
	/**
	 * Get all {{entitiesLabel}} children
	 * @access public
	 * @param bool $asArray
	 * @return mixed (array|string)
	 * {{qwertyuiop}}
	 */
	public function getAllChildren($asArray = false){
		$children = $this->getResource()->getAllChildren($this);
		if ($asArray) {
			return $children;
		}
		else {
			return implode(',', $children);
		}
	}
	/**
	 * Get all {{entitiesLabel}} children
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getChildren(){
		return implode(',', $this->getResource()->getChildren($this, false));
	}
	/**
	 * check the id
	 * @access public
	 * @return bool
	 * {{qwertyuiop}}
	 */
	public function checkId($id){
		return $this->_getResource()->checkId($id);
	}
	/**
	 * Get array {{entitiesLabel}} ids which are part of {{entityLabel}} path
	 * @access public
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function getPathIds(){
		$ids = $this->getData('path_ids');
		if (is_null($ids)) {
			$ids = explode('/', $this->getPath());
			$this->setData('path_ids', $ids);
		}
		return $ids;
	}
	/**
	 * Retrieve level
	 * @access public
	 * @return int
	 * {{qwertyuiop}}
	 */
	public function getLevel(){
		if (!$this->hasLevel()) {
			return count(explode('/', $this->getPath())) - 1;
		}
		return $this->getData('level');
	}
	/**
	 * Verify {{entityLabel}} ids
	 * @access public
	 * @param array $ids
	 * @return bool
	 * {{qwertyuiop}}
	 */
	public function verifyIds(array $ids){
		return $this->getResource()->verifyIds($ids);
	}
	/**
	 * check if {{entityLabel}} has children
	 * @access public
	 * @return bool
	 * {{qwertyuiop}}
	 */
	public function hasChildren(){
		return $this->_getResource()->getChildrenAmount($this) > 0;
	}
	/**
	 * check if {{entityLabel}} can be deleted
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Model_{{Entity}}
	 * {{qwertyuiop}}
	 */
	protected function _beforeDelete(){
		if ($this->getResource()->isForbiddenToDelete($this->getId())) {
			Mage::throwException(Mage::helper('{{module}}')->__("Can't delete root {{entityLabel}}."));
		}
		return parent::_beforeDelete();
	}
	/**
	 * get the {{entitiesLabel}}
	 * @access public
	 * @param {{Namespace}}_{{Module}}_Model_{{Entity}} $parent
	 * @param int $recursionLevel
	 * @param bool $sorted
	 * @param bool $asCollection
	 * @param bool $toLoad
	 * {{qwertyuiop}}
	 */
	public function get{{Entities}}($parent, $recursionLevel = 0, $sorted=false, $asCollection=false, $toLoad=true){
		return $this->getResource()->get{{Entities}}($parent, $recursionLevel, $sorted, $asCollection, $toLoad);
	}
	/**
	 * Return parent {{entitiesLabel}} of current {{entityLabel}}
	 * @access public
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function getParent{{Entities}}(){
		return $this->getResource()->getParent{{Entities}}($this);
	}
	/**
	 * Retuen children {{entitiesLabel}} of current {{entityLabel}}
	 * @access public
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function getChildren{{Entities}}(){
		return $this->getResource()->getChildren{{Entities}}($this);
	}
