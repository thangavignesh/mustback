<?php
{{License}}
/**
 * {{EntityLabel}} widget block
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_{{Entity}}_Widget_View extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface{
	protected $_htmlTemplate = '{{namespace}}_{{module}}/{{entity}}/widget/view.phtml';
	/**
	 * Prepare a for widget
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_{{Entity}}_Widget_View
	 * {{qwertyuiop}}
	 */
	protected function _beforeToHtml() {
		parent::_beforeToHtml();
		${{entity}}Id = $this->getData('{{entity}}_id');
		if (${{entity}}Id) {
			${{entity}} = Mage::getModel('{{module}}/{{entity}}')
				->setStoreId(Mage::app()->getStore()->getId())
				->load(${{entity}}Id);
