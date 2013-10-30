	/**
	 * export as csv - action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function exportCsvAction(){
		$fileName   = '{{entity}}.csv';
		$content	= $this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_grid')->getCsv();
		$this->_prepareDownloadResponse($fileName, $content);
	}
	/**
	 * export as MsExcel - action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function exportExcelAction(){
		$fileName   = '{{entity}}.xls';
		$content	= $this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_grid')->getExcelFile();
		$this->_prepareDownloadResponse($fileName, $content);
	}
	/**
	 * export as xml - action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function exportXmlAction(){
		$fileName   = '{{entity}}.xml';
		$content	= $this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_grid')->getXml();
		$this->_prepareDownloadResponse($fileName, $content);
	}
}