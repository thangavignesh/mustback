	/**
 	 * default action
 	 * @access public
 	 * @return void
 	 * {{qwertyuiop}}
 	 */
 	public function indexAction(){
		$this->loadLayout();
 		if (Mage::helper('{{module}}/{{entity}}')->getUseBreadcrumbs()){
			if ($breadcrumbBlock = $this->getLayout()->getBlock('breadcrumbs')){
				$breadcrumbBlock->addCrumb('home', array(
							'label'	=> Mage::helper('{{module}}')->__('Home'), 
							'link' 	=> Mage::getUrl(),
						)
				);
				$breadcrumbBlock->addCrumb('{{entities}}', array(
							'label'	=> Mage::helper('{{module}}')->__('{{EntitiesLabel}}'), 
							'link'	=> '',
					)
				);
			}
		}
