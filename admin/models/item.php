<?php
/**
 * @version        1.0
 * @package        Joomla
 * @subpackage     Training
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2016 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

class CodeModelItem extends JModelLegacy
{
	public function save($data)
	{
		// Perform some code to save item here
		return true;
	}

	/**
	 * Populate model states
	 */
	public function populateState()
	{
		$this->setState('id', JFactory::getApplication()->input->getInt('id', 0));
	}

	/**
	 * Get data of record being edited
	 */
	public function getData()
	{
		$item = new stdClass;

		$id = (int) $this->getState('id', 0);

		if ($id)
		{
			$item->id          = $id;
			$item->name       = 'Events Booking';
			$item->description = 'The best Events Registration extension for Joomla';
		}
		else
		{
			$item->id          = 0;
			$item->name       = '';
			$item->description = '';
		}

		return $item;
	}
}