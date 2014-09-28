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

<form action="<?php echo JRoute::_('index.php?option=com_wbty_pricing{parent_url}&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="option-form" class="form-validate form-horizontal">
	<input type="hidden" name="task" value="" />
    <input type="hidden" name="option" id="option" value="com_wbty_pricing" />
    <input type="hidden" name="form_name" id="form_name" value="option" />
    <?php echo JHtml::_('form.token'); ?>
</form>