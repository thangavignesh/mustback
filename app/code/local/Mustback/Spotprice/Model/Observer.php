<?php
	class Mustback_Spotprice_Model_Observer
	{
		public function _construct()
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
			$feed = Mage::getModel('spotprice/feed')->getCollection()
					 ->addFieldToFilter('metal_name', $metalTypeName)
					 ->setOrder('create_time', 'desc')
			         ->setCurPage(1)
					 ->setPageSize(1);
			$feedData = $feed->getData();
			#Get metal recent price from feed_price table.
			$metalPrice = $feedData[0]["value"];        
			$manufacturingCost = $product->getManufacturingCost();
			$newCost = ( $weight * $metalPrice ) + $manufacturingCost;
			
			#Save the new calculated cost.
			$product->setPriceView($newCost)
						  ->save();
						
			print "<pre>";
			print "Metal type: $metalType <br>";
			print "Weight: $weight <br>";
			print "Metal Type: $metalTypeName <br>";
			print "Metal price: $metalPrice<br>";
			print "Manufacturing Cost: $manufacturingCost<br>";
			print "New Cost: $newCost<br>";
			print_r($feed->getData());
			print "End";	
			print "</pre>";
			#exit(0);
			
			
			
			$product->setPrice(($weight * 10));
			return $this;
		}
	}
?>