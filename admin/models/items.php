<?php
/**
 * @version        1.0
 * @package        Joomla
 * @subpackage     Training
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2016 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

class CodeModelItems extends JModelLegacy
{
	/**
	 * Get list of items to display
	 *
	 * @return array
	 */
	public function getData()
	{
		$items = [];

		// First item
		$item              = new stdClass;
		$item->id          = 1;
		$item->name        = 'Events Booking';
		$item->description = 'The best event registration extension for Joomla';

		$items[] = $item;

		// Second item
		$item              = new stdClass;
		$item->id          = 2;
		$item->name        = 'Membership Pro';
		$item->description = 'The best membership / subscription extension for Joomla';

		$items[] = $item;

		// Third item
		$item              = new stdClass;
		$item->id          = 3;
		$item->name        = 'EShop';
		$item->description = 'The best shopping cart extension for Joomla';

		$items[] = $item;

		return $items;
	}
}