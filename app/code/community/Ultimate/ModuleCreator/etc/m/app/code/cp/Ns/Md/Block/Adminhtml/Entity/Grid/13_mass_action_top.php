	/**
	 * prepare mass action
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Grid
	 * {{qwertyuiop}}
	 */
	protected function _prepareMassaction(){
		$this->setMassactionIdField('entity_id');
		$this->getMassactionBlock()->setFormFieldName('{{entity}}');
		$this->getMassactionBlock()->addItem('delete', array(
			'label'=> Mage::helper('{{module}}')->__('Delete'),
			'url'  => $this->getUrl('*/*/massDelete'),
			'confirm'  => Mage::helper('{{module}}')->__('Are you sure?')
		));
