<?php
{{License}}
/**
 * {{EntityLabel}} admin edit block
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
	/**
	 * constuctor
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function __construct(){
		parent::__construct();
		$this->_blockGroup = '{{module}}';
		$this->_controller = 'adminhtml_{{entity}}';
		$this->_updateButton('save', 'label', Mage::helper('{{module}}')->__('Save {{EntityLabel}}'));
		$this->_updateButton('delete', 'label', Mage::helper('{{module}}')->__('Delete {{EntityLabel}}'));
		$this->_addButton('saveandcontinue', array(
			'label'		=> Mage::helper('{{module}}')->__('Save And Continue Edit'),
			'onclick'	=> 'saveAndContinueEdit()',
			'class'		=> 'save',
		), -100);
		$this->_formScripts[] = "
			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}
		";
	}
	/**
	 * get the edit form header
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getHeaderText(){
		if( Mage::registry('{{entity}}_data') && Mage::registry('{{entity}}_data')->getId() ) {
			return Mage::helper('{{module}}')->__("Edit {{EntityLabel}} '%s'", $this->htmlEscape(Mage::registry('{{entity}}_data')->get{{EntityNameMagicCode}}()));
		} 
		else {
			return Mage::helper('{{module}}')->__('Add {{EntityLabel}}');
		}
	}
}