			if (!${{entity}}->getId()) {
				$parentId = $this->getRequest()->getParam('parent');
				if (!$parentId) {
					$parentId = Mage::helper('{{module}}/{{entity}}')->getRoot{{Entity}}Id();
				}
				$parent{{Entity}} = Mage::getModel('{{module}}/{{entity}}')->load($parentId);
				${{entity}}->setPath($parent{{Entity}}->getPath());
			}
			try {
