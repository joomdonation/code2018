<?php
/**
 * @version        1.0
 * @package        Joomla
 * @subpackage     Training
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2016 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Code', ['default_view' => 'items']);
$controller->execute(JFactory::getApplication()->input->getCmd('task'));
$controller->redirect();