<?php
{{License}}
/**
 * {{entity}} - {{sibling}} relation edit block
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tab_{{Sibling}} extends Mage_Adminhtml_Block_Widget_Grid{
	/**
	 * Set grid params
	 * @access protected
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function __construct(){
		parent::__construct();
		$this->setId('{{sibling}}_grid');
		$this->setDefaultSort('position');
		$this->setDefaultDir('ASC');
		$this->setUseAjax(true);
		if ($this->get{{Entity}}()->getId()) {
			$this->setDefaultFilter(array('in_{{siblings}}'=>1));
		}
	}
	/**
	 * prepare the {{sibling}} collection
	 * @access protected 
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tab_{{Sibling}}
	 * {{qwertyuiop}}
	 */
	protected function _prepareCollection() {
		$collection = Mage::getResourceModel('{{module}}/{{sibling}}_collection');
		if ($this->get{{Entity}}()->getId()){
			$constraint = 'related.{{entity}}_id='.$this->get{{Entity}}()->getId();
		}
		else{
			$constraint = 'related.{{entity}}_id=0';
		}
		$collection->getSelect()->joinLeft(
			array('related'=>$collection->getTable('{{module}}/{{entity}}_{{sibling}}')),
			'related.{{sibling}}_id=main_table.entity_id AND '.$constraint,
			array('position'));
		$this->setCollection($collection);
		parent::_prepareCollection();
		return $this;
	}
	/**
	 * prepare mass action grid
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tab_{{Sibling}}
	 * {{qwertyuiop}}
	 */ 
	protected function _prepareMassaction(){
		return $this;
	}
	/**
	 * prepare the grid columns
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tab_{{Sibling}}
	 * {{qwertyuiop}}
	 */
	protected function _prepareColumns(){
		$this->addColumn('in_{{siblings}}', array(
			'header_css_class'  => 'a-center',
			'type'  => 'checkbox',
			'name'  => 'in_{{siblings}}',
			'values'=> $this->_getSelected{{Siblings}}(),
			'align' => 'center',
			'index' => 'entity_id'
		));
		$this->addColumn('{{siblingNameAttribute}}', array(
			'header'=> Mage::helper('{{module}}')->__('{{siblingNameAttributeLabel}}'),
			'align' => 'left',
			'index' => '{{siblingNameAttribute}}',
		));
		$this->addColumn('position', array(
			'header'=> Mage::helper('{{module}}')->__('Position'),
			'name'  => 'position',
			'width' => 60,
			'type'  => 'number',
			'validate_class'=> 'validate-number',
			'index' => 'position',
			'editable'  => true,
		));
	}
	/**
	 * Retrieve selected {{siblings}}
	 * @access protected
	 * @return array
	 * {{qwertyuiop}}
	 */
	protected function _getSelected{{Siblings}}(){
		${{siblings}} = $this->get{{Entity}}{{Siblings}}();
		if (!is_array(${{siblings}})) {
			${{siblings}} = array_keys($this->getSelected{{Siblings}}());
		}
		return ${{siblings}};
	}
 	/**
	 * Retrieve selected {{siblings}}
	 * @access protected
	 * @return array
	 * {{qwertyuiop}}
	 */
	public function getSelected{{Siblings}}() {
		${{siblings}} = array();
		$selected = Mage::registry('current_{{entity}}')->getSelected{{Siblings}}();
		if (!is_array($selected)){
			$selected = array();
		}
		foreach ($selected as ${{sibling}}) {
			${{siblings}}[${{sibling}}->getId()] = array('position' => ${{sibling}}->getPosition());
		}
		return ${{siblings}};
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
		return $this->getUrl('*/*/{{siblings}}Grid', array(
			'id'=>$this->get{{Entity}}()->getId()
		));
	}
	/**
	 * get the current {{entity}}
	 * @access public
	 * @return {{Namespace}}_{{Module}}_Model_{{Entity}}
	 * {{qwertyuiop}}
	 */
	public function get{{Entity}}(){
		return Mage::registry('current_{{entity}}');
	}
	/**
	 * Add filter
	 * @access protected
	 * @param object $column
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Edit_Tab_{{Sibling}}
	 * {{qwertyuiop}}
	 */
	protected function _addColumnFilterToCollection($column){
		// Set custom filter for in product flag
		if ($column->getId() == 'in_{{siblings}}') {
			${{sibling}}Ids = $this->_getSelected{{Siblings}}();
			if (empty(${{sibling}}Ids)) {
				${{sibling}}Ids = 0;
			}
			if ($column->getFilter()->getValue()) {
				$this->getCollection()->addFieldToFilter('entity_id', array('in'=>${{sibling}}Ids));
			} 
			else {
				if(${{sibling}}Ids) {
					$this->getCollection()->addFieldToFilter('entity_id', array('nin'=>${{sibling}}Ids));
				}
			}
		} 
		else {
			parent::_addColumnFilterToCollection($column);
		}
		return $this;
	}
}