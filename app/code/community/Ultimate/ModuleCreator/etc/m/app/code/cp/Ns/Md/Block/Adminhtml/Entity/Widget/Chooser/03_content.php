	}
	/**
	 * Prepare chooser element HTML
	 * @access public
	 * @param Varien_Data_Form_Element_Abstract $element Form Element
	 * @return Varien_Data_Form_Element_Abstract
	 * {{qwertyuiop}}
	 */
	public function prepareElementHtml(Varien_Data_Form_Element_Abstract $element){
		$uniqId = Mage::helper('core')->uniqHash($element->getId());
		$sourceUrl = $this->getUrl('{{module}}/adminhtml_{{module}}_{{entity}}_widget/chooser', array('uniq_id' => $uniqId));
		$chooser = $this->getLayout()->createBlock('widget/adminhtml_widget_chooser')
				->setElement($element)
				->setTranslationHelper($this->getTranslationHelper())
				->setConfig($this->getConfig())
				->setFieldsetId($this->getFieldsetId())
				->setSourceUrl($sourceUrl)
				->setUniqId($uniqId);
		if ($element->getValue()) {
			${{entity}} = Mage::getModel('{{module}}/{{entity}}')->load($element->getValue());
			if (${{entity}}->getId()) {
				$chooser->setLabel(${{entity}}->get{{EntityNameMagicCode}}());
			}
		}
		$element->setData('after_element_html', $chooser->toHtml());
		return $element;
	}
	/**
	 * Grid Row JS Callback
	 * @access public
	 * @return string
	 * {{qwertyuiop}}
	 */
	public function getRowClickCallback(){
		$chooserJsObject = $this->getId();
		$js = '
			function (grid, event) {
				var trElement = Event.findElement(event, "tr");
				var {{entity}}Id = trElement.down("td").innerHTML.replace(/^\s+|\s+$/g,"");
				var {{entity}}Title = trElement.down("td").next().innerHTML;
				'.$chooserJsObject.'.setElementValue({{entity}}Id);
				'.$chooserJsObject.'.setElementLabel({{entity}}Title);
				'.$chooserJsObject.'.close();
			}
		';
		return $js;
	}
	/**
	 * Prepare a static blocks collection
	 * @access protected
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Widget_Chooser
	 * {{qwertyuiop}}
	 */
	protected function _prepareCollection(){
		$collection = Mage::getModel('{{module}}/{{entity}}')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	/**
	 * Prepare columns for the a grid
	 * @access protected 
	 * @return {{Namespace}}_{{Module}}_Block_Adminhtml_{{Entity}}_Widget_Chooser
	 * {{qwertyuiop}}
	 */
	protected function _prepareColumns(){
		$this->addColumn('chooser_id', array(
			'header'	=> Mage::helper('{{module}}')->__('Id'),
			'align' 	=> 'right',
			'index' 	=> 'entity_id',
			'type'		=> 'number',
			'width' 	=> 50
		));
		
		$this->addColumn('chooser_{{nameAttribute}}', array(
			'header'=> Mage::helper('{{module}}')->__('{{nameAttributeLabel}}'),
			'align' => 'left',
			'index' => '{{nameAttribute}}',
		));
		if (!Mage::app()->isSingleStoreMode()) {
			$this->addColumn('store_id', array(
				'header'=> Mage::helper('{{module}}')->__('Store Views'),
				'index' => 'store_id',
				'type'  => 'store',
				'store_all' => true,
				'store_view'=> true,
				'sortable'  => false,
			));
		}
