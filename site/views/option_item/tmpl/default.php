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
?>

<ul class="itemlist">
            
	
					<li><?php echo JText::_('COM_WBTY_PRICING_FORM_LBL_OPTION_ITEMS_TITLE'); ?>: <?php echo $this->item->title; ?></li>
					<li><?php echo JText::_('COM_WBTY_PRICING_FORM_LBL_OPTION_ITEMS_PRICE_CHANGE'); ?>: <?php echo $this->item->price_change; ?></li>
					<li><?php echo JText::_('COM_WBTY_PRICING_FORM_LBL_OPTION_ITEMS_PRICE_CHANGE_TYPE'); ?>: <?php echo $this->item->price_change_type; ?></li>

</ul>