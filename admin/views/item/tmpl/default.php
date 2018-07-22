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
<h2>Add/edit item</h2>
<form method="post" action="index.php?option=com_code" name="adminForm" id="adminForm" class="form form-horizontal">
    <div class="control-group">
        <div class="control-label">Name</div>
        <div class="controls"><input type="text" name="name" value="<?php echo $this->item->name; ?>" /></div>
    </div>
    <div class="control-group">
        <div class="control-label">Description</div>
        <div class="controls">
            <textarea name="description" rows="10" cols="50"><?php echo $this->item->description; ?></textarea>
        </div>
    </div>
    <div class="form-actions">
        <input type="submit" name="btnSubmit" value="Save" class="btn btn-primary" />
    </div>
    <input type="hidden" name="task" value="item.save" />
	<?php echo JHtml::_('form.token'); ?>
</form>
