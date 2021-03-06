	/**
	 * wyisiwyg action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function wysiwygAction(){
		$elementId = $this->getRequest()->getParam('element_id', md5(microtime()));
		$storeMediaUrl = Mage::app()->getStore(0)->getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
		
		$content = $this->getLayout()->createBlock('adminhtml/catalog_helper_form_wysiwyg_content', '', array(
			'editor_element_id' => $elementId,
			'store_id'  		=> 0,
			'store_media_url'   => $storeMediaUrl,
		));
		$this->getResponse()->setBody($content->toHtml());
	}
