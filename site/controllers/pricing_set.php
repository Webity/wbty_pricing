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

jimport('wbty_components.controllers.wbtycontrollerform');

/**
 * pricing_set controller class.
 */
class Wbty_pricingControllerPricing_Set extends WbtyControllerForm
{

    function __construct() {
        $this->view_list = 'pricing_sets';
        parent::__construct();
		
		$this->_model = $this->getModel();
    }
	
	function back() {
		$this->setRedirect(
			JRoute::_(
				'index.php?option=' . $this->option . '&view=' . $this->view_list
				. $this->getRedirectToListAppend(), false
			)
		);
	}
	
	function link () {
		echo parent::link();
		exit();
	}
	
	function link_load() {
		echo parent::link_load('pricing_set_id');
		exit();
	}
	
	function ajax_save() {
		$this->model = $this->getModel();
		if ($id = $this->model->save(JRequest::getVar('jform'), array())) {
			echo $id;
		} else {
			echo "error";
		}
		exit();
	}
	
}