<?php 
/**
 * Ultimate_ModuleCreator extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE_UMC.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category   	Ultimate
 * @package		Ultimate_ModuleCreator
 * @copyright  	Copyright (c) 2012
 * @license		http://opensource.org/licenses/mit-license.php MIT License
 */ 
/**
 * attribute type country
 * 
 * @category	Ultimate
 * @package		Ultimate_ModuleCreator
 * @author 		Marius Strajeru <marius.strajeru@gmail.com>
 */ 
class Ultimate_ModuleCreator_Model_Attribute_Type_Country extends Ultimate_ModuleCreator_Model_Attribute_Type_Abstract{
	/**
	 * sql colum ddl size
	 * @var string
	 */
	protected $_sizeDdl 	= '2';
	/**
	 * get the type for the form
	 * @access public
	 * @return string
	 * @author Marius Strajeru <marius.strajeru@gmail.com>
	 */
	public function getFormType(){
		return 'select';
	}
	/**
	 * get the options for form input
	 * @access public
	 * @return string
	 * @author Marius Strajeru <marius.strajeru@gmail.com>
	 */
	public function getFormOptions(){
		$options = parent::getFormOptions();
		$module = strtolower($this->getAttribute()->getEntity()->getModule()->getModuleName());
		$options .= self::OPTION_SEPARATOR."'values'=> Mage::getResourceModel('directory/country_collection')->toOptionArray(),\n";
		return $options;
	}
	/**
	 * get the sql column
	 * @access public
	 * @return string
	 * @author Marius Strajeru <marius.strajeru@gmail.com>
	 */
	public function getSqlColumn(){
		return '`'.$this->getAttribute()->getCode().'` VARCHAR(3) '.$this->getNullSql().' default \'\',';
	}
	/**
	 * get html for frontend
	 * @access public
	 * @return string
	 * @author Marius Strajeru <marius.strajeru@gmail.com>
	 */
	public function getFrontendHtml(){
		$entityName = strtolower($this->getAttribute()->getEntity()->getNameSingular());
		$ucEntity = ucfirst($entityName);
		$module = strtolower($this->getAttribute()->getEntity()->getModule()->getModuleName());
		return '<?php echo Mage::helper(\''.$module.'\')->__("'.$this->getAttribute()->getLabel().'");?>:<?php echo ($_'.$entityName.'->get'.$this->getAttribute()->getMagicMethodCode().'()) ? Mage::getModel(\'directory/country\')->load($_'.$entityName.'->get'.$this->getAttribute()->getMagicMethodCode().'())->getName():Mage::helper(\''.$module.'\')->__(\'None\') ?>'."\n";
	}
	/**
	 * get the grid column options
	 * @access public
	 * @return string
	 * @author Marius Strajeru <marius.strajeru@gmail.com>
	 */
	public function getColumnOptions(){
		return "'type'		=> 'country',\n";
	}
	/**
	 * get the RSS feed text
	 * @access public
	 * @return string
	 * @author Marius Strajeru <marius.strajeru@gmail.com>
	 */
	public function getRssText(){
		$entityName = strtolower($this->getAttribute()->getEntity()->getNameSingular());
		$ucEntity = ucfirst($entityName);
		$module = strtolower($this->getAttribute()->getEntity()->getModule()->getModuleName());
		return '			$description .= Mage::helper(\''.$module.'\')->__("'.$this->getAttribute()->getLabel().'").\':\'.(($item->get'.$this->getAttribute()->getMagicMethodCode().'()) ? Mage::getModel(\'directory/country\')->load($item->get'.$this->getAttribute()->getMagicMethodCode().'())->getName():Mage::helper(\''.$module.'\')->__(\'None\'));';
	}
}