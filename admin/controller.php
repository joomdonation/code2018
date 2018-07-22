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
		echo 'No action, we will just display something, usually a view';
	}

	/**
	 * Sample method for controller.
	 *
	 * This method will be executed when user access to index.php?option=com_code&task=task1
	 *
	 * If task is not provided, default method display will be executed
	 */
	public function task1()
	{
		echo 'Task 1 is executed';
	}

	/**
	 * Sample method for getting data from request (GET or POST)
	 *
	 * This method will be executed when users access to URL like
	 * index.php?option=com_code&task=get_input_data&a=1&b=1.05......
	 *
	 * @throws Exception
	 */
	public function get_input_data()
	{
		$input = JFactory::getApplication()->input;

		$option      = $input->getCmd('option');
		$task        = $input->getCmd('task');
		$a           = $input->getInt('a');
		$b           = $input->getFloat('b');
		$title       = $input->getString('title');
		$description = $input->getHtml('description');
		$data        = $input->getArray(array(), null, 'raw');

		// To get data from GET, use similar code, just change $input to $input->get
		$a = $input->get->getInt('a', 0);
		$b = $input->get->getFloat('b');

		// To get data from POST, use similar code, just change $input to $input->post
		$description = $input->post->getHtml('description');
	}

	/**
	 * This sample method is used to show how to create model objects from controller use getModel method
	 *
	 * @throws Exception
	 */
	public function get_model()
	{
		$data = JFactory::getApplication()->input->getArray(array(), null, 'raw');
		// Create Item model, call save method to save an item

		/* @var CodeModelItem $model */
		$model  = $this->getModel('Item');
		$result = $model->save($data);

		if ($result)
		{
			echo 'Success' . '<br />';
		}
		else
		{
			echo 'Fail' . '<br />';
		}

		// Create Items model, call getData method to get data

		/* @var CodeModelItems $model */
		$model = $this->getModel('Items');
		$data  = $model->getData();

		foreach ($data as $item)
		{
			echo $item . '<br />';
		}

		/*
		 * Call getModel method without parameter, in this case, the system will try to find default model which has
		 * same name with controller (code in this case). Since there is no CodeModelCode model class defined, we will
		 * only get null
		 */
		$model = $this->getModel();
		var_dump($model);

		/*
		 * Call getModel method with all parameters. Usually, it's needed when when don't want the the system to call
		 * populateState method of model class when model object created (so not setting model states base on data from
		 * request)
		 */
		$model = $this->getModel('Item', 'CodeModel', ['ignore_request' => true]);

		echo 'With ignore_request set to true';
		var_dump($model->getState('a'));

		$model = $this->getModel('Item', 'CodeModel', ['ignore_request' => false]);

		echo 'With ignore_request set to false, populateState method from model will be called and state variable a will have value 1';
		var_dump($model->getState('a'));
	}

	/**
	 * Sample method to demo how to use controller setRedirect method. It is usually used after controller performing
	 * an action such as saving an item and then redirect to a view which display list of items
	 */
	public function set_redirect_success()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_code&view=items', false), JText::_('Item saved'));
	}

	/**
	 * Sample method to demo how to use controller setRedirect method. It is usually used after controller performing
	 * an action such as saving an item and then redirect to a view which display list of items. In this case, the system
	 * will show a warning message
	 */
	public function set_redirect_warning()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_code&view=items', false), JText::_('Item saving error'), 'warning');
	}

	/**
	 * Sample method to demo how to use controller setRedirect method. It is usually used after controller performing
	 * an action such as saving an item and then redirect to a view which display list of items. In this case, the system
	 * will show an error message (for example, when item could not be saved for some reasons)
	 */
	public function set_redirect_error()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_code&view=items', false), JText::_('Item saving error'), 'error');
	}

	/**
	 * Sample method to demo how to use controller setMessage method. It is used to show a message (info, warning, error)
	 * on a new page which we will redirect to
	 */
	public function set_message()
	{
		$this->setMessage(JText::_('Item save success'));

		// Try to uncomment one of the line of code below to see different behavior of setMessage
		//$this->setMessage(JText::_('Item saving error'), 'warning');
		//$this->setMessage(JText::_('Item saving error'), 'error');
		$this->setRedirect(JRoute::_('index.php?option=com_code&view=items', false));
	}
}