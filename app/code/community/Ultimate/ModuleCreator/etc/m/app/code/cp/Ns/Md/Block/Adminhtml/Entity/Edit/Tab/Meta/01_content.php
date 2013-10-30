<?php 
{{License}}
/**
 * meta information tab
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tab_Meta extends Mage_Adminhtml_Block_Widget_Form{
	/**
	 * prepare the form
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tab_Meta
	 * {{qwertyuiop}}
	 */
	protected function _prepareForm(){
		$form = new Varien_Data_Form();
		$form->setFieldNameSuffix('{{entity}}');
		$this->setForm($form);
		$fieldset = $form->addFieldset('{{entity}}_meta_form', array('legend'=>Mage::helper('{{module}}')->__('Meta information')));
		$fieldset->addField('meta_title', 'text', array(
			'label' => Mage::helper('{{module}}')->__('Meta-title'),
			'name'  => 'meta_title',
		));
		$fieldset->addField('meta_description', 'textarea', array(
			'name'  	=> 'meta_description',
			'label' 	=> Mage::helper('{{module}}')->__('Meta-description'),
  		));
  		$fieldset->addField('meta_keywords', 'textarea', array(
			'name'  	=> 'meta_keywords',
			'label' 	=> Mage::helper('{{module}}')->__('Meta-keywords'),
  		));
  		$form->addValues(Mage::registry('current_{{entity}}')->getData());
		return parent::_prepareForm();
	}
}