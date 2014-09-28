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

JHtml::_('behavior.tooltip');

?>

<div class="cpanel">
	<h2>Main Tasks</h2>
    <div class="icon-wrapper">
        
				<div class="icon">
					<a href="index.php?option=com_wbty_pricing&view=pricing_sets"><img src="<?php echo JURI::root(); ?>media/wbty_pricing/img/pricing_sets.png" alt="" width="48"><span>Pricing Sets</span></a>
				</div>
				<div class="icon">
					<a href="index.php?option=com_wbty_pricing&view=options"><img src="<?php echo JURI::root(); ?>media/wbty_pricing/img/options.png" alt="" width="48"><span>Options</span></a>
				</div>
        <div class="clr"></div>
    </div>
    <h2 style="clear:left;">Configuration / Settings</h2>
    <div class="icon-wrapper">
        
				<div class="icon">
					<a href="index.php?option=com_wbty_pricing&view=option_types"><img src="<?php echo JURI::root(); ?>media/wbty_pricing/img/option_types.png" alt=""><span>Option Types</span></a>
				</div>
        <div class="clr"></div>
    </div>
</div>