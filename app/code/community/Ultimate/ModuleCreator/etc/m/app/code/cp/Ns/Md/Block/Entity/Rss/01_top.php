<?php 
{{License}}
/**
 * {{EntityLabel}} RSS block
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Block_{{Entity}}_Rss extends Mage_Rss_Block_Abstract{
	/**
	 * Cache tag constant for feed reviews
	 * @var string
	 */
	const CACHE_TAG = 'block_html_{{module}}_{{entity}}_rss';
	/**
	 * constructor
	 * @access protected
	 * @return void
	 * {{qwertyuiop}}
	 */
	protected function _construct(){
		$this->setCacheTags(array(self::CACHE_TAG));
		/*
		* setting cache to save the rss for 10 minutes
		*/
		$this->setCacheKey('{{module}}_{{entity}}_rss');
		$this->setCacheLifetime(600);
	}
	/**
	 * toHtml method
	 * @access protected
	 * @return string
	 * {{qwertyuiop}}
	 */
	protected function _toHtml(){
		$url = Mage::helper('{{module}}')->get{{Entities}}Url();
		$title = Mage::helper('{{module}}')->__('{{EntitiesLabel}}');
		$rssObj = Mage::getModel('rss/rss');
		$data = array(
			'title' => $title,
			'description' => $title,
			'link'=> $url,
			'charset' => 'UTF-8',
		);
		$rssObj->_addHeader($data);
		$collection = Mage::getModel('{{module}}/{{entity}}')->getCollection()
			->addStoreFilter(Mage::app()->getStore())

