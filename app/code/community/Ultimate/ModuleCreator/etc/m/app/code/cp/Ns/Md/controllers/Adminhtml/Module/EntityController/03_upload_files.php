				${{attributeCode}}Name = $this->_uploadAndGetName('{{attributeCode}}', Mage::helper('{{module}}/{{entity}}')->getFileBaseDir(), $data);
				${{entity}}->setData('{{attributeCode}}', ${{attributeCode}}Name);
