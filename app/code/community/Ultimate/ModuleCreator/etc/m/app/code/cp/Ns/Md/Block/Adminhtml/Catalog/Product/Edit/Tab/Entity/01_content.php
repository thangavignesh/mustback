<?php
{{License}}
/**
 * {{EntityLabel}} tab on product edit form
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_Adminhtml_Catalog_Product_Edit_Tab_{{Entity}} extends Mage_Adminhtml_Block_Widget_Grid{
	/**
	 * Set grid params
	 * @access protected
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function __construct(){
		parent::__construct();
		$this->setId('{{entity}}_grid');
		$this->setDefaultSort('position');
		$this->setDefaultDir('ASC');
		$this->setUseAjax(true);
		if ($this->getProduct()->getId()) {
			$this->setDefaultFilter(array('in_{{entities}}'=>1));
		}
	}
	/**
	 * prepare the {{entity}} collection
	 * @access protected 
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_Catalog_Product_Edit_Tab_{{Entity}}
	 * {{qwertyuiop}}
	 */
	protected function _prepareCollection() {
		$collection = Mage::getResourceModel('{{module}}/{{entity}}_collection');
		if ($this->getProduct()->getId()){
			$constraint = 'related.product_id='.$this->getProduct()->getId();
			}
			else{
				$constraint = 'related.product_id=0';
			}
		$collection->getSelect()->joinLeft(
			array('related'=>$collection->getTable('{{module}}/{{entity}}_product')),
			'related.{{entity}}_id=main_table.entity_id AND '.$constraint,
			array('position')
		);
		$this->setCollection($collection);
		parent::_prepareCollection();
		return $this;
	}
	/**
	 * prepare mass action grid
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_Catalog_Product_Edit_Tab_{{Entity}}
	 * {{qwertyuiop}}
	 */ 
	protected function _prepareMassaction(){
		return $this;
	}
	/**
	 * prepare the grid columns
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_Catalog_Product_Edit_Tab_{{Entity}}
	 * {{qwertyuiop}}
	 */
	protected function _prepareColumns(){
		$this->addColumn('in_{{entities}}', array(
			'header_css_class'  => 'a-center',
			'type'  => 'checkbox',
			'name'  => 'in_{{entities}}',
			'values'=> $this->_getSelected{{Entities}}(),
			'align' => 'center',
			'index' => 'entity_id'
		));
		$this->addColumn('{{nameAttribute}}', array(
			'header'=> Mage::helper('{{module}}')->__('{{nameAttributeLabel}}'),
			'align' => 'left',
			'index' => '{{nameAttribute}}',
		));
		$this->addColumn('position', array(
			'header'		=> Mage::helper('{{module}}')->__('Position'),
			'name'  		=> 'position',
			'width' 		=> 60,
			'type'		=> 'number',
			'validate_class'=> 'validate-number',
			'index' 		=> 'position',
			'editable'  	=> true,
		));
	}
	/**
	 * Retrieve selected {{entities}}
	 * @access protected
	 * @return array
	 * {{qwertyuiop}}
	 */
	protected function _getSelected{{Entities}}(){
		${{entities}} = $this->getProduct{{Entities}}();
		if (!is_array(${{entities}})) {
			${{entities}} = array_keys($this->getSelected{{Entities}}());
		}
		return ${{entities}};
	}
 	/**
	 * Retrieve selected {{entities}}
	 * @access protected
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function getSelected{{Entities}}() {
		${{entities}} = array();
		//used helper here in order not to override the product model
		$selected = Mage::helper('{{module}}/product')->getSelected{{Entities}}(Mage::registry('current_product'));
		if (!is_array($selected)){
			$selected = array();
		}
		foreach ($selected as ${{entity}}) {
			${{entities}}[${{entity}}->getId()] = array('position' => ${{entity}}->getPosition());
		}
		return ${{entities}};
	}
	/**
	 * get row url
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getRowUrl($item){
		return '#';
	}
	/**
	 * get grid url
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getGridUrl(){
		return $this->getUrl('*/*/{{entities}}Grid', array(
			'id'=>$this->getProduct()->getId()
		));
	}
	/**
	 * get the current product
	 * @access public
	 * @return Mage_Catalog_Model_Product
	 * {{qwertyuiop}}
	 */
	public function getProduct(){
		return Mage::registry('current_product');
	}
	/**
	 * Add filter
	 * @access protected
	 * @param object $column
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_Catalog_Product_Edit_Tab_{{Entity}}
	 * {{qwertyuiop}}
	 */
	protected function _addColumnFilterToCollection($column){
		if ($column->getId() == 'in_{{entities}}') {
			${{entity}}Ids = $this->_getSelected{{Entities}}();
			if (empty(${{entity}}Ids)) {
				${{entity}}Ids = 0;
			}
			if ($column->getFilter()->getValue()) {
				$this->getCollection()->addFieldToFilter('entity_id', array('in'=>${{entity}}Ids));
			} 
			else {
				if(${{entity}}Ids) {
					$this->getCollection()->addFieldToFilter('entity_id', array('nin'=>${{entity}}Ids));
				}
			}
		} 
		else {
			parent::_addColumnFilterToCollection($column);
		}
		return $this;
	}
}