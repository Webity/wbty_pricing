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
		if (file_exists(JPATH_ADMINISTRATOR . '/components/com_wbty_shop/wbty_shop.php')) { //} && JFactory::getApplication()->input->get('extension') == 'com_wbty_shop') {
			JSubMenuHelper::addEntry(
				JText::_('Back to WBTY Shop'),
				'index.php?option=com_wbty_shop&view=controlpanel',
				$vName == 'shop'
			);
		}
		
		JSubMenuHelper::addEntry(
			JText::_('COM_WBTY_PRICING_TITLE_CONTROLPANEL'),
			'index.php?option=com_wbty_pricing&view=controlpanel',
			$vName == 'controlpanel'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_WBTY_PRICING_TITLE_PRICING_SETS'),
			'index.php?option=com_wbty_pricing&view=pricing_sets',
			$vName == 'pricing_sets'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_WBTY_PRICING_TITLE_OPTIONS'),
			'index.php?option=com_wbty_pricing&view=options',
			$vName == 'options'
		);
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
}
