<?php
	class Mustback_Spotprice_Model_Mysql4_Feed extends Mage_Core_Model_Mysql4_Abstract
	{
		public function _construct()
		{
			parent::__construct();
			$this->_init('spotprice/feed', 'feed_id');
		}
		
	}
?>