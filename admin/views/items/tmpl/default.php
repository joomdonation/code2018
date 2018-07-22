<?php
/**
 * @version        1.0.0
 * @package        Joomla
 * @subpackage     Code
 * @author         Ossolution Team
 * @copyright      Copyright (C) 2018 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */
?>
<h2>Items List</h2>
<table class="table table-stripped table-bordered">
    <thead>
        <tr>
            <th>
                <?php echo JText::_('ID'); ?>
            </th>
            <th>
                <?php echo JText::_('Name'); ?>
            </th>
            <th>
		        <?php echo JText::_('Description'); ?>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($this->items as $item)
    {
	    $link = JRoute::_('index.php?option=com_code&view=item&id=' . $item->id);
	?>
        <tr>
            <td>
			    <?php echo $item->id; ?>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo $item->name; ?></a>
            </td>
            <td>
			    <?php echo $item->description; ?>
            </td>
        </tr>
	<?php
    }
    ?>
    </tbody>
</table>
