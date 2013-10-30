					$breadcrumbBlock->addCrumb('{{entities}}', array(
								'label'	=> Mage::helper('{{module}}')->__('{{EntitiesLabel}}'), 
								'link'	=> Mage::helper('{{module}}')->get{{Entities}}Url(),
						)
					);
					$parents = ${{entity}}->getParent{{Entities}}();
					foreach ($parents as $parent){
						if ($parent->getId() != Mage::helper('{{module}}/{{entity}}')->getRoot{{Entity}}Id() && $parent->getId() != ${{entity}}->getId()){
							$breadcrumbBlock->addCrumb('{{entity}}-'.$parent->getId(), array(
									'label'	=> $parent->get{{EntityNameMagicCode}}(), 
									'link'	=> $link = $parent->get{{Entity}}Url(),
							));
						}
					}
