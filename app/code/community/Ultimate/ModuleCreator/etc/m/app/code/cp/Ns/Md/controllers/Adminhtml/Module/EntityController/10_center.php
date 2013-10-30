				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('{{module}}')->__('There was a problem saving the {{entityLabel}}.'));
				Mage::getSingleton('adminhtml/session')->setFormData($data);
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
			}
		}
		Mage::getSingleton('adminhtml/session')->addError(Mage::helper('{{module}}')->__('Unable to find {{entityLabel}} to save.'));
		$this->_redirect('*/*/');
	}
	/**
	 * delete {{entityLabel}} - action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0) {
			try {
				${{entity}} = Mage::getModel('{{module}}/{{entity}}');
				${{entity}}->setId($this->getRequest()->getParam('id'))->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('{{module}}')->__('{{EntityLabel}} was successfully deleted.'));
				$this->_redirect('*/*/');
				return; 
			}
			catch (Mage_Core_Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
			catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('{{module}}')->__('There was an error deleteing {{entityLabel}}.'));
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				Mage::logException($e);
				return;
			}
		}
		Mage::getSingleton('adminhtml/session')->addError(Mage::helper('{{module}}')->__('Could not find {{entityLabel}} to delete.'));
		$this->_redirect('*/*/');
	}
	/**
	 * mass delete {{entityLabel}} - action
	 * @access public
	 * @return void
	 * {{qwertyuiop}}
	 */
	public function massDeleteAction() {
		${{entity}}Ids = $this->getRequest()->getParam('{{entity}}');
		if(!is_array(${{entity}}Ids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('{{module}}')->__('Please select {{entitiesLabel}} to delete.'));
		}
		else {
			try {
				foreach (${{entity}}Ids as ${{entity}}Id) {
					${{entity}} = Mage::getModel('{{module}}/{{entity}}');
					${{entity}}->setId(${{entity}}Id)->delete();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('{{module}}')->__('Total of %d {{entitiesLabel}} were successfully deleted.', count(${{entity}}Ids)));
			}
			catch (Mage_Core_Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
			catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('{{module}}')->__('There was an error deleteing {{entitiesLabel}}.'));
				Mage::logException($e);
			}
		}
		$this->_redirect('*/*/index');
	}
