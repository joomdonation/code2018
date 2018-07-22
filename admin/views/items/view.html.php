<?php
/**
 * @version        1.0.0
 * @package        Joomla
 * @subpackage     Code
 * @author         Ossolution Team
 * @copyright      Copyright (C) 2018 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

class CodeViewItems extends JViewLegacy
{
	public function display($tpl = null)
	{
		// This command will call getData method of associated model class (CodeModelItems)
		$this->items = $this->get('Data');

		return parent::display($tpl);
	}
}