<?php
{{License}}
/**
 * {{EntityLabel}} admin edit tabs
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{
	/**
	 * constructor
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function __construct(){
		parent::__construct();
		$this->setId('{{entity}}_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(Mage::helper('{{module}}')->__('{{EntityLabel}}'));
	}
	/**
	 * before render html
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tabs
	 * {{qwertyuiop}}
	 */
	protected function _beforeToHtml(){
		$this->addTab('form_{{entity}}', array(
			'label'		=> Mage::helper('{{module}}')->__('{{EntityLabel}}'),
			'title'		=> Mage::helper('{{module}}')->__('{{EntityLabel}}'),
			'content' 	=> $this->getLayout()->createBlock('{{module}}/adminhtml_{{entity}}_edit_tab_form')->toHtml(),
		));
