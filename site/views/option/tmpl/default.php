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
            
	
					<li><?php echo JText::_('COM_WBTY_PRICING_FORM_LBL_OPTIONS_OPTION_TYPE'); ?>: <?php echo $this->item->option_types_name; ?></li>
					<li><?php echo JText::_('COM_WBTY_PRICING_FORM_LBL_OPTIONS_NAME'); ?>: <?php echo $this->item->name; ?></li>

</ul>