		$headBlock = $this->getLayout()->getBlock('head');
		if ($headBlock) {
			$headBlock->setTitle(Mage::getStoreConfig('{{module}}/{{entity}}/meta_title'));
			$headBlock->setKeywords(Mage::getStoreConfig('{{module}}/{{entity}}/meta_keywords'));
			$headBlock->setDescription(Mage::getStoreConfig('{{module}}/{{entity}}/meta_description'));
		}
