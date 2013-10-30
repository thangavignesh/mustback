	/**
	 * Move {{entityLabel}} in tree
	 *
	 * @param int ${{entity}}Id
	 * @param int $parentId
	 * @param int $afterId
	 * @return boolean
	 */
	public function move(${{entity}}Id, $parentId, $afterId = null){
		${{entity}} = $this->_init{{Entity}}(${{entity}}Id);
		$parent_{{entity}} = $this->_init{{Entity}}($parentId);
		if ($afterId === null && $parent_{{entity}}->hasChildren()) {
			$parentChildren = $parent_{{entity}}->getChildren();
			$afterId = array_pop(explode(',', $parentChildren));
		}
		if( strpos($parent_{{entity}}->getPath(), ${{entity}}->getPath()) === 0) {
			$this->_fault('not_moved', Mage::helper('{{module}}')->__("Cannot move parent inside {{entityLabel}}"));
		}
		try {
			${{entity}}->move($parentId, $afterId);
		} 
		catch (Mage_Core_Exception $e) {
			$this->_fault('not_moved', $e->getMessage());
		}
		return true;
	}
