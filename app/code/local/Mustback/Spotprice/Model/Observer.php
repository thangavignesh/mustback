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
		public function updateOIPriceCatBfSave($observer)
		{
			error_reporting(E_ALL);
			ini_set( 'display_errors','1');
			$event = $observer->getEvent();
			$product = $event->getProduct();
			
			#call the spot price business function
			$product = $this->__applySpotPrice($product);
						
			return $this;
		}

		
		/* Business Functions Begin*/
		
			private function __applySpotPrice($item)
			{
				#Get attributes of the Item
				$itemPrice = $item->getPrice();
				$itemMetalName = $item->getAttributeText("metal_type"); //custom attribute metal_type
				$itemWeight = $item->getWeight();
				$itemManufacturingCost = $item->getManufacturingCost();
				
				#Load market feed value
				$feed = Mage::getModel('spotprice/feed')->getCollection()
				->addFieldToFilter('metal_name', $itemMetalName)
				->setOrder('create_time', 'desc')
				->setCurPage(1)
				->setPageSize(1);
				
				$feedData = $feed->getData();
				#Get metal recent price from feed_price table.
				$metalSpotPriceOunce = $feedData[0]["value"]; //Attribute value holding the price number
				
				#Convert units from ounce to gram
				$metalSpotPriceGram = $metalSpotPriceOunce / 31.1034768; //1 troy ounce = 31.1034768 grams
				
				#Spot price formula
				$calculatedSpotPrice = ( $itemWeight * $metalSpotPriceGram ) + $itemManufacturingCost;
				
				#Save the calculated price
				$item->setPrice($calculatedSpotPrice);
				
				return $item;
				
			}
		/* Business Functions End*/
	}
?>