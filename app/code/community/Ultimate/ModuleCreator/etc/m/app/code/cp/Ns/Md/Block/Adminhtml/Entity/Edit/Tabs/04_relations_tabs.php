		$this->addTab('{{siblings}}', array(
			'label' => Mage::helper('{{module}}')->__('{{SiblingsLabel}}'),
			'url'   => $this->getUrl('*/*/{{siblings}}', array('_current' => true)),
   			'class'	=> 'ajax'
		));
