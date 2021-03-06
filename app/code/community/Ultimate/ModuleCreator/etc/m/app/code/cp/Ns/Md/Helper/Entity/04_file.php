	/**
	 * get base files dir
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getFileBaseDir(){
		return Mage::getBaseDir('media').DS.'{{entity}}'.DS.'file';
	}
	/**
	 * get base file url
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getFileBaseUrl(){
		return Mage::getBaseUrl('media').'{{entity}}'.'/'.'file';
	}
