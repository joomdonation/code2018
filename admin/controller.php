<?php
/**
 * @version        1.0.0
 * @package        Joomla
 * @subpackage     Code
 * @author         Ossolution Team
 * @copyright      Copyright (C) 2018 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

class CodeController extends JControllerLegacy
{
	/**
	 * This display is a default method in controller. When a request is made to this component without task variable,
	 * or with task variable has value of a none existing method, this default method will be displayed
	 *
	 * @param bool  $cachable
	 * @param array $urlparams
	 *
	 * @return JControllerLegacy|void
	 */
	public function display($cachable = false, $urlparams = array())
	{
		return parent::display($cachable, $urlparams);
	}
}