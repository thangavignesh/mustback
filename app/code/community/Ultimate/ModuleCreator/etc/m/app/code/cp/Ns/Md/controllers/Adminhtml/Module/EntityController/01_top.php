<?php
{{License}}
/**
 * {{EntityLabel}} admin controller
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Adminhtml_{{Module}}_{{Entity}}Controller extends {{Namespace}}_{{Module}}_Controller_Adminhtml_{{Module}}{
	/**
	 * init the {{entity}}
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Model_{{Entity}}
	 */
	protected function _init{{Entity}}(){
		${{entity}}Id  = (int) $this->getRequest()->getParam('id');
		${{entity}}	= Mage::getModel('{{module}}/{{entity}}');
		if (${{entity}}Id) {
			${{entity}}->load(${{entity}}Id);
		}
		Mage::register('current_{{entity}}', ${{entity}});
		return ${{entity}};
	}
 	/**
	 * default action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function indexAction() {
		$this->loadLayout();
		$this->_title(Mage::helper('{{module}}')->__('{{Module}}'))
			 ->_title(Mage::helper('{{module}}')->__('{{EntitiesLabel}}'));
		$this->renderLayout();
	}
	/**
	 * grid action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function gridAction() {
		$this->loadLayout()->renderLayout();
	}
	/**
	 * edit {{entityLabel}} - action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function editAction() {
		${{entity}}Id	= $this->getRequest()->getParam('id');
		${{entity}}  	= $this->_init{{Entity}}();
		if (${{entity}}Id && !${{entity}}->getId()) {
			$this->_getSession()->addError(Mage::helper('{{module}}')->__('This {{entityLabel}} no longer exists.'));
			$this->_redirect('*/*/');
			return;
		}
		$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
		if (!empty($data)) {
			${{entity}}->setData($data);
		}
		Mage::register('{{entity}}_data', ${{entity}});
		$this->loadLayout();
		$this->_title(Mage::helper('{{module}}')->__('{{Module}}'))
			 ->_title(Mage::helper('{{module}}')->__('{{EntitiesLabel}}'));
		if (${{entity}}->getId()){
			$this->_title(${{entity}}->get{{EntityNameMagicCode}}());
		}
		else{
			$this->_title(Mage::helper('{{module}}')->__('Add {{entityLabel}}'));
		}
		if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) { 
			$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true); 
		}
		$this->renderLayout();
	}
	/**
	 * new {{entityLabel}} action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function newAction() {
		$this->_forward('edit');
	}
	/**
	 * save {{entityLabel}} - action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function saveAction() {
		if ($data = $this->getRequest()->getPost('{{entity}}')) {
			try {
				${{entity}} = $this->_init{{Entity}}();
				${{entity}}->addData($data);
