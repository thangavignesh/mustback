<?php
	class Mustback_Spotprice_Model_Observer
	{
		const UAP_PROCESS_NAME = 'updateAllPriceCJob';
		private $indexProcess;
		
		public function __construct()
		{
			$this->indexProcess = new Mage_Index_Model_Process();
			$this->indexProcess->setId(self::UAP_PROCESS_NAME);
		}
		
		/**
		 * Applies the spot price on the final price.
		 * @param   Varien_Event_Observer $observer
		 * @return  Mustback_Spotprice_Model_Observer
		 */
		public function updateOIPriceCatBfSave($observer)
		{
			$event = $observer->getEvent();
			$product = $event->getProduct();
			if($product->getTypeId() == 'simple')
			{
				#call the spot price business function
				$product = $this->__applySpotPrice($product);
			}
						
			return $this;
		}
		
		/**
		 * Applies the spot price on the final price to all products.
		 * @return  Mustback_Spotprice_Model_Observer
		 */
		
		 public function updateAllPriceCJob()
		 {
		 	error_reporting(E_ALL);
		 	ini_set( 'display_errors','1');
		 	$result = true;
		 	if($this->indexProcess->isLocked())
		 	{
		 		$msg = sprintf("Another process (%s) is already running.", SELF::UAP_PROCESS_NAME);
		 		Mage::log($msg);
		 		$result = false;
		    }
		    else
		    {
		    	#Create a semaphore
		    	$this->indexProcess->lockAndBlock();
		    	Mage::log("updateAllPriceCJob initiated");
		        
		    	#Load all products
		 		$products = Mage::getResourceModel('catalog/product_collection')
		 		->addAttributeToSelect('*')
		 		->addAttributeToFilter('status', array('eq' => Mage_Catalog_Model_Product_Status::STATUS_ENABLED) ) // status: 1=enabled, 2=disabled
		 		->setOrder('created_at', 'desc');
		    	
		 		$productIds = $products->getAllIds();
		 				 		
		 		foreach($productIds as $productId)
		 		{
			 		$product = Mage::getModel('catalog/product')->load($productId);
		 			$this->__applySpotPrice($product);
		 			$msg = sprintf("Id: %s ->Name: %s ->Price: %s", $product->getId(), $product->getName(), $product->getPrice());
		 			Mage::log( $msg );
		 		}
		 		#Relax the created semaphore
		 	    $this->indexProcess->unlock();
		 		Mage::log("updateAllPriceCJob completed");
		    }
		    
		    return $result;
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
				$calculatedSpotPrice = sprintf( "%0.2f", ( $itemWeight * $metalSpotPriceGram ) + $itemManufacturingCost );
				
				#Save the calculated price
				$item->setPrice($calculatedSpotPrice);
				
				return $item;
				
			}
		/* Business Functions End*/
	}
?>