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
 * View class for a list of Wbty_pricing.
 */
class Wbty_pricingViewpricing_sets extends JView
{
	protected $items;
	protected $pagination;
	protected $state;
    protected $params;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $app                = JFactory::getApplication();
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
        $this->params       = $app->getParams('com_wbty_pricing');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

        $this->_prepareDocument();
        $this->addToolbar();
		
		parent::display($tpl);
	}


	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();
		$title	= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		} else {
			$this->params->def('page_heading', JText::_('com_wbty_pricing_DEFAULT_PAGE_TITLE'));
		}
		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}    

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT.DS.'helpers'.DS.'wbty_pricing.php';

		$state	= $this->get('State');
		$canDo	= Wbty_pricingHelper::getActions($state->get('filter.category_id'));

		//load the JToolBar library and create a toolbar
		jimport('joomla.html.toolbar');
		$bar = new JToolBar( 'toolbar' );

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.DS.'views'.DS.'pricing_set';
	
		if (file_exists($formPath)) {
            if ($canDo->get('core.create')) {
				$bar->appendButton( 'Standard', 'new', 'New', 'pricing_set.add', false );
			   // JToolBarHelper::addNew('routine.add','JTOOLBAR_NEW');
		    }
		    if ($canDo->get('core.edit')) {
				$bar->appendButton( 'Standard', 'edit', 'Edit', 'pricing_set.edit', false );
				
				if (isset($this->items[0]->state)) {
					//$bar->appendButton( 'Standard', 'archive', 'Archive', 'pricing_sets.archive', false );
				}
				if (isset($this->items[0]->checked_out)) {
					$bar->appendButton( 'Standard', 'checkin', 'Check In', 'pricing_sets.checkin', false );
				}
		    }
			
			if ($canDo->get('core.edit.state')) {
				$bar->appendButton( 'Standard', 'trash', 'Trash', 'pricing_sets.trash', false );
			}
			
        }
	
		if ($canDo->get('core.admin')) {
			//JToolBarHelper::preferences('com_fsfitness');
		}
		
		return $bar->render();
	}
    	
}
