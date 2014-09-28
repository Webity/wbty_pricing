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

jimport('joomla.application.component.view');

/**
 * View for the control panel
 */
class Wbty_pricingViewControlPanel extends JView
{
	protected $state;
	protected $item;
	protected $form;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state	= $this->get('State');
		
		$model = $this->getModel();
		$this->forms = $model->getForms(
			array(
				'option_types_search', 
				'pricing_sets_search', 
				'options_search', 
				'option_items_search', 
			)
		);

		parent::display($tpl);
	}
}
