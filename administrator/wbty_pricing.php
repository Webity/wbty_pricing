<?php
/**
 * @version     0.4.0
 * @package     com_wbty_pricing
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Webity <david@makethewebwork.com> - http://www.makethewebwork.com
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_wbty_pricing')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

// Include base css and javascript files for the component
// Import CSS
$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::root(true) . "/media/wbty_pricing/css/wbty_pricing.css");
$document->addStyleSheet(JURI::root(true) . "/media/wbty_pricing/css/redmond/jquery-ui-1.8.19.custom.css");
$document->addStyleSheet(JURI::root(true) . "/media/wbty_pricing/css/bootstrap.min.css");

// Import Javascript
$document->addScript(JURI::root(true) . "/media/wbty_pricing/js/jquery.min.js");
$document->addScript(JURI::root(true) . "/media/wbty_pricing/js/jquery-ui-1.8.19.custom.min.js");
$document->addScript(JURI::root(true) . "/media/wbty_pricing/js/bootstrap.min.js");

$controller	= JController::getInstance('Wbty_pricing');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
