<?php
/**
 * @version     0.4.0
 * @package     com_wbty_pricing
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Webity <david@makethewebwork.com> - http://www.makethewebwork.com
 */

// No direct access.
defined('_JEXEC') or die;

jimport('wbty_components.models.wbtymodeladmin');

/**
 * Wbty_pricing model.
 */
class Wbty_pricingModeloption extends WbtyModelAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected $text_prefix = 'com_wbty_pricing';
	protected $com_name = 'wbty_pricing';
	protected $list_name = 'options';


	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'options', $prefix = 'Wbty_pricingTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		An optional array of data for the form to interogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true, $control='jform')
	{
		// Initialise variables.
		$app	= JFactory::getApplication();
		
		$key=JRequest::getVar('subtable_key');
		if ($control=='jform' && $key && JRequest::getVar('tmpl')=='component') {
			$control = 'option['.$key.']';
		}

		// Get the form.
		$form = $this->loadForm('com_wbty_pricing.option.'.$control, 'option', array('control' => $control, 'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}

		return $form;
	}
	
	public function getItems($parent_id, $parent_key) {
		$query = $this->_db->getQuery(true);
		
		$query->select('id');
		$query->from($this->getTable()->getTableName());
		$query->where($parent_key . '=' . (int)$parent_id);
		$query->where($parent_key . '!= 0');
		
		$data = $this->_db->setQuery($query)->loadObjectList();
		if (count($data)) {
			$this->getState();
			$key=0;
			foreach ($data as $key=>$d) {
				$this->data = null;
				$this->setState($this->getName() . '.id', $d->id);
				$return[$key+1] = $this->getForm(array(), true, 'option['.$key.']');
			}
		}
		
		return $return;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		if ($this->data) {
			return $this->data;
		}
		
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_wbty_pricing.edit.option.data', array());

		if (empty($data)) {
			$data = $this->getItem();
		}

		return $data;
	}

	/**
	 * Method to get a single record.
	 *
	 * @param	integer	The id of the primary key.
	 *
	 * @return	mixed	Object on success, false on failure.
	 * @since	1.6
	 */
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk)) {

			//Do any procesing on fields here if needed
			
				$db =& JFactory::getDbo();
				$query = $db->getQuery(true);
				$query->from('#__wbty_pricing_options as a');
				
				$query->select('option_types.name as option_types_name');
				$query->join('LEFT', '#__wbty_pricing_option_types as option_types ON a.option_type=option_types.id');
				$query->where('a.id='.$item->id);
				$items = $db->setQuery($query)->loadObject();
				if($items) {
					foreach($items as $key=>$value) {
						if ($value && $key) {
							$item->$key = $value;
						}
					}
				}
			
		}

		return $item;
	}

	/**
	 * Prepare and sanitise the table prior to saving.
	 *
	 * @since	1.6
	 */
	protected function prepareTable(&$table)
	{
		jimport('joomla.filter.output');

		parent::prepareTable($table);
		
		
	}
	
	function save($data) {
		if (!parent::save($data)) {
			return false;
		}
		
		// manage link
		
		$option_item = JRequest::getVar('option_item', array(), 'post', 'ARRAY');
		$this->save_sub('option_item', $option_item, 'option_id');
		
		return $this->table_id;
	}
}