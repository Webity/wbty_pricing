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
JHtml::_('behavior.formvalidation');

$document = &JFactory::getDocument();
$document->addScript(JURI::root(true) . "/media/wbty_pricing/js/linked_tables.js");
//$document->addScript(JURI::root(true) . "/media/wbty_pricing/js/table_select.js");


ob_start();
// start javascript output -- script
?>
 
window.addEvent('domready', function(){
    // save validator, getting overwritten by AJAX call
    document.pricing_set_optionvalidator = document.formvalidator;
    jQuery('#toolbar-box a').each(function() {
    	if ($(this).attr('onclick')) {
	    	$(this).attr('data-onclick', $(this).attr('onclick')).attr('onclick','');
        }
    });
    jQuery('#toolbar-box a').click(function() { 
    	Joomla.submitbutton = document.pricing_set_optionsubmitbutton;
        
        // clean up hidden subtables
        jQuery('.subtables:hidden').remove();
        
        eval($(this).attr('data-onclick'));
    });
});
Joomla.submitbutton = function(task)
{
    if (task == 'pricing_set_option.cancel' || document.pricing_set_optionvalidator.isValid(document.id('pricing_set_option-form'))) {
        Joomla.submitform(task, document.getElementById('pricing_set_option-form'));
    }
    else {
        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
    }
}
document.pricing_set_optionsubmitbutton = Joomla.submitbutton;
<?php
// end javascript output -- /script
$script=ob_get_contents();
ob_end_clean();
$document->addScriptDeclaration($script);
?>

<form action="<?php echo JRoute::_('index.php?option=com_wbty_pricing&pricing_set_id='.JRequest::getCmd('pricing_set_id').'&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="pricing_set_option-form" class="form-validate form-horizontal">
	<div class="width-50 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_WBTY_PRICING_LEGEND_PRICING_SET_OPTION'); ?></legend>
			<div class="control-group">
                <?php echo str_replace('<label', '<label class="control-label"', $this->form->getLabel('id')); ?>
                <div class="controls">
                	<?php echo $this->form->getInput('id'); ?>
                </div>
         	</div>
            
            
			<div<?php if (strpos($this->form->getInput('options'), 'type="hidden')===FALSE) { echo ' class="control-group"'; } ?>>
                <?php echo str_replace('<label', '<label class="control-label"', $this->form->getLabel('options')); ?>
                <div class="controls">
                	<?php echo $this->form->getInput('options'); ?>
                </div>
         	</div>

            <div<?php if (strpos($this->form->getInput('state'), 'type="hidden')===FALSE) { echo ' class="control-group"'; } ?>>
                <?php echo str_replace('<label', '<label class="control-label"', $this->form->getLabel('state')); ?>
                <div class="controls">
                	<?php echo $this->form->getInput('state'); ?>
                </div>
         	</div>
            <div<?php if (strpos($this->form->getInput('checked_out'), 'type="hidden')===FALSE) { echo ' class="control-group"'; } ?>>
                <?php echo str_replace('<label', '<label class="control-label"', $this->form->getLabel('checked_out')); ?>
                <div class="controls">
                	<?php echo $this->form->getInput('checked_out'); ?>
                </div>
         	</div>
            <div<?php if (strpos($this->form->getInput('checked_out_time'), 'type="hidden')===FALSE) { echo ' class="control-group"'; } ?>>
                <?php echo str_replace('<label', '<label class="control-label"', $this->form->getLabel('checked_out_time')); ?>
                <div class="controls">
                	<?php echo $this->form->getInput('checked_out_time'); ?>
                </div>
         	</div>
		</fieldset>
        
	</div>
        
	<?php // fieldset for each linked table  ?>
    <div class="width-50 fltlft">
<?php
// Add hidden form fields so as to run neccesary scripts for any modals, ect.
require_once(JPATH_COMPONENT_ADMINISTRATOR . '/helpers/ajax.php');
$helper = new wbty_pricingHelperAjax;
?></div>
	
	<input type="hidden" name="task" value="" />
    <input type="hidden" name="option" id="option" value="com_wbty_pricing" />
    <input type="hidden" name="form_name" id="form_name" value="pricing_set_option" />
	<?php echo JHtml::_('form.token'); ?>
	<div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>