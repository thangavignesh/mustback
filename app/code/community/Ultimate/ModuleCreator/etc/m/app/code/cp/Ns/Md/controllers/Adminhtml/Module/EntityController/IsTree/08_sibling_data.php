				${{siblings}} = $this->getRequest()->getPost('{{entity}}_{{siblings}}', -1);
				if (${{siblings}} != -1) {
					${{sibling}}Data = array();
					parse_str(${{siblings}}, ${{sibling}}Data);
					${{siblings}} = array();
					foreach (${{sibling}}Data as $id=>$position){
						${{sibling}}[$id]['position'] = $position;
					}
					${{entity}}->set{{Siblings}}Data(${{sibling}}Data);
				}
