		$this->addTab('products', array(
			'label' => Mage::helper('{{module}}')->__('Associated products'),
			'url'   => $this->getUrl('*/*/products', array('_current' => true)),
   			'class'	=> 'ajax'
		));
