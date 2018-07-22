<?php
/**
 * @version        1.0.0
 * @package        Joomla
 * @subpackage     Code
 * @author         Ossolution Team
 * @copyright      Copyright (C) 2018 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

class CodeControllerItem extends JControllerLegacy
{
	public function save()
	{
		$input = JFactory::getApplication()->input;

		$data = $input->getArray(array(), null, 'raw');

		$model = $this->getModel('Item');

		$return = $model->save($data);

		if ($return)
		{
			$this->setMessage('Item successfully saved');
		}
		else
		{
			$this->setMessage('Error saving item');
		}

		$this->setRedirect('index.php?option=com_code&view=items');
	}
}