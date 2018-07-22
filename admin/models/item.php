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
		return true;
	}

	/**
	 * Populate model states
	 */
	public function populateState()
	{
		$this->setState('a', 1);
	}
}