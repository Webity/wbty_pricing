<?php
/**
 * @version     0.4.0
 * @package     com_wbty_pricing
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Webity <david@makethewebwork.com> - http://www.makethewebwork.com
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Wbty_pricing helper.
 */
class Wbty_pricingHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		
		
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_wbty_pricing';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
	
	static function getPricingSet($id = 0) {
		if (!$id) {
			return '';
		}
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.*');
		$query->from('#__wbty_pricing_pricing_sets as a');
		$query->where('a.id = '.(int)$id);
		$query->where('a.state = 1');
		
		$item = $db->setQuery($query)->loadObject();
		
		$query = $db->getQuery(true);
		$query->select('a.options as id');
		$query->from('#__wbty_pricing_pricing_set_options as a');
		$query->where('a.pricing_set_id = '.(int)$item->id);
		$query->where('a.state = 1');
		
		$item->options = $db->setQuery($query)->loadObjectList();
		
		foreach ( $item->options as $key => $values) {
			
			$query = $db->getQuery(true);
		
			$query->select('*');
			$query->from('#__wbty_pricing_options as a');
			$query->join('LEFT', '#__wbty_pricing_option_items as oi ON oi.option_id = a.id');
			$query->where('a.id = '.(int)$values->id);
			
			$item->options[$key] = $db->setQuery($query)->loadObjectList();
		};
		
		return $item;
	}
}
