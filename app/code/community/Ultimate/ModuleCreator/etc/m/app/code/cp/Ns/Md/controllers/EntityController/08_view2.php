		else{
			Mage::register('current_{{module}}_{{entity}}', ${{entity}});
			$this->loadLayout();
			if ($root = $this->getLayout()->getBlock('root')) {
				$root->addBodyClass('{{module}}-{{entity}} {{module}}-{{entity}}' . ${{entity}}->getId());
			}
			if (Mage::helper('{{module}}/{{entity}}')->getUseBreadcrumbs()){
				if ($breadcrumbBlock = $this->getLayout()->getBlock('breadcrumbs')){
					$breadcrumbBlock->addCrumb('home', array(
								'label'	=> Mage::helper('{{module}}')->__('Home'), 
								'link' 	=> Mage::getUrl(),
							)
					);
