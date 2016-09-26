<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

\JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
?>
<div id="j-sidebar-container" class="span2">
	<?=  \JHtmlSidebar::render(); ?>
</div>
<div id="j-main-container" class="span10">
<form action="index.php?option=<?= EXTENSION_ELEMENT ?>&view=helloworlds" method="post" id="adminForm" name="adminForm">
	<div class="row-fluid">
		<div class="span6">
			<?= \JText::_('COM_HELLOWORLD_MESSAGES_FILTER'); ?>
			<?=
				\JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		</div>
	</div>
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?=  \JText::_('COM_HELLOWORLD_NUM'); ?></th>
			<th width="2%">
				<?=  \JHtml::_('grid.checkall'); ?>
			</th>
			<th width="90%">
				<?=  \JHtml::_('grid.sort', 'COM_HELLOWORLD_MESSAGES_NAME', 'greeting', $listDirn, $listOrder); ?>
			</th>
			<th width="5%">
				<?=  \JHtml::_('grid.sort', 'COM_HELLOWORLD_PUBLISHED', 'published', $listDirn, $listOrder); ?>
			</th>
			<th width="2%">
				<?=  \JHtml::_('grid.sort', 'COM_HELLOWORLD_ID', 'id', $listDirn, $listOrder); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?=  $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = \JRoute::_('index.php?option=' . EXTENSION_ELEMENT . '&task=message.edit&id=' . $row->id);
				?>
					<tr>
						<td><?=  $this->pagination->getRowOffset($i); ?></td>
						<td>
							<?=  \JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?=  $link; ?>" title="<?=  \JText::_('COM_HELLOWORLD_EDIT_HELLOWORLD'); ?>">
								<?=  $row->greeting; ?>
							</a>
						</td>
						<td align="center">
							<?=  \JHtml::_('jgrid.published', $row->published, $i, 'messages.', true, 'cb'); ?>
						</td>
						<td align="center">
							<?=  $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?=  $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?=  $listDirn; ?>"/>
	<?=  \JHtml::_('form.token'); ?>
</form>
</div>
