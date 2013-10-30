<?php
{{License}}
/**
 * {{EntityLabel}} model
 *
 * @category	{{Namespace}}
 * @package		{{Namespace}}_{{Module}}
 * {{qwertyuiop}}
 */
class {{Namespace}}_{{Module}}_Model_{{Entity}} extends Mage_Core_Model_Abstract{
	/**
	 * Entity code.
	 * Can be used as part of method name for entity processing
	 */
	const ENTITY= '{{module}}_{{entity}}';
	const CACHE_TAG = '{{module}}_{{entity}}';
	/**
	 * Prefix of model events names
	 * @var string
	 */
	protected $_eventPrefix = '{{module}}_{{entity}}';
	
	/**
	 * Parameter name in event
	 * @var string
	 */
	protected $_eventObject = '{{entity}}';
