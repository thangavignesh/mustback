<?php
	class Mustback_Spotprice_Model_Feed extends Mage_Core_Model_Abstract
	{
		public function _construct()
		{
			parent::_construct();
			$this->_init('spotprice/feed');
		}
	}
?>