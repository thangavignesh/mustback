	/**
	 * get the url to the {{entityLabel}} details page
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function get{{Entity}}Url(){
		return Mage::getUrl('{{module}}/{{entity}}/view', array('id'=>$this->getId()));
	}
