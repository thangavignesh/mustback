				${{attributeCode}}Name = $this->_uploadAndGetName('{{attributeCode}}', Mage::helper('{{module}}/{{entity}}_image')->getImageBaseDir(), $data);
				${{entity}}->setData('{{attributeCode}}', ${{attributeCode}}Name);
