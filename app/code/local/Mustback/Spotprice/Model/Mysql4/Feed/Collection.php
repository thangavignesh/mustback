<?php
	class Mustback_Spotprice_Model_Mysql4_Feed_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
	{
		public function _construct()
		{
			parent::_construct();
			$this->_init('Spotprice/feed');
		}
	}
?>