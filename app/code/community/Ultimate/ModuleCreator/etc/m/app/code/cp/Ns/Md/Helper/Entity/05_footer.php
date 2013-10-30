	/**
	 * check if breadcrumbs can be used
	 * @access public
	 * @return bool
	 * {{qwertyuiop}}
	 */
	public function getUseBreadcrumbs(){
		return Mage::getStoreConfigFlag('{{module}}/{{entity}}/breadcrumbs');
	}
}