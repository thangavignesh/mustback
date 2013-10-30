<?php
	class Mustback_Spotprice_Model_Feed extends Mage_Core_Model_Abstract
	{
		public function __construct()
		{
			parent::__construct();
			$this->_init('spotprice/feed');
		}
	}
?>