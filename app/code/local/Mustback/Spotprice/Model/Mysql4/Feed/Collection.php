<?php
	class Mustback_Spotprice_Model_Mysql4_Collection_Abstract extends Mage_Core_Model_Mysql4_Collection_Abstract
	{
		public function __construct()
		{
			$this->_init('spotprice/feed');
		}
	}
?>