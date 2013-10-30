<?php
	class Mustback_Spotprice_Model_Observer
	{
		public function __construct()
		{
			
		}
		
		/**
		 * Applies the spot price on the final price.
		 * @param   Varien_Event_Observer $observer
		 * @return  Mustback_Spotprice_Model_Observer
		 */
		public function updatePrice($observer)
		{
			error_reporting(E_ALL);
			ini_set( 'display_errors','1');
			$event = $observer->getEvent();
			$product = $event->getProduct();
			
			$metalType = $product->getMetalType();
			$metalTypeName = $product->getAttributeText("metal_type");
			$weight = $product->getWeight();
			$feeds = Mage::getResourceModel('spotprice/feed_collection');
			$feeds->addFieldToFilter('metal_name', $metalTypeName);
			$feeds->load();
			
					
			
			print "<pre>";
			print "Metal type: $metalType <br>";
			print "Weight: $weight <br>";
			print "Metal Type: $metalTypeName <br>";
			if($feeds->getFirstItem())
			{
				$feed = $feeds->getFirstItem();
				print $feed->getValue();
			}
			else
			{
				print "No feed list for the metal $metalTypeName";
			}
				
			print "</pre>";
			
			exit(0);
			
			$product->setPrice(($weight * 10));
			return $this;
		}
	}
?>