<div class="musics index">
	<h2><?php echo __('Musics'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('label_id'); ?></th>
			<th><?php echo $this->Paginator->sort('album_id'); ?></th>
			<th><?php echo $this->Paginator->sort('youtube'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($musics as $music): ?>
	<tr>
		<td><?php echo h($music['Music']['id']); ?>&nbsp;</td>
		<td><?php echo h($music['Music']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($music['Label']['name'], array('controller' => 'labels', 'action' => 'view', $music['Label']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($music['Album']['name'], array('controller' => 'albums', 'action' => 'view', $music['Album']['id'])); ?>
		</td>
		<td><?php echo h($music['Music']['youtube']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $music['Music']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $music['Music']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $music['Music']['id']), null, __('Are you sure you want to delete # %s?', $music['Music']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Music'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Labels'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kinds'), array('controller' => 'kinds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kind'), array('controller' => 'kinds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sets'), array('controller' => 'sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Set'), array('controller' => 'sets', 'action' => 'add')); ?> </li>
	</ul>
</div>
