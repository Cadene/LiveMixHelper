<div class="labels view">
<h2><?php echo __('Label'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($label['Label']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($label['Label']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Label'), array('action' => 'edit', $label['Label']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Label'), array('action' => 'delete', $label['Label']['id']), null, __('Are you sure you want to delete # %s?', $label['Label']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Labels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Musics'), array('controller' => 'musics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Music'), array('controller' => 'musics', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Musics'); ?></h3>
	<?php if (!empty($label['Music'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Label Id'); ?></th>
		<th><?php echo __('Album Id'); ?></th>
		<th><?php echo __('Youtube'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($label['Music'] as $music): ?>
		<tr>
			<td><?php echo $music['id']; ?></td>
			<td><?php echo $music['name']; ?></td>
			<td><?php echo $music['label_id']; ?></td>
			<td><?php echo $music['album_id']; ?></td>
			<td><?php echo $music['youtube']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'musics', 'action' => 'view', $music['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'musics', 'action' => 'edit', $music['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'musics', 'action' => 'delete', $music['id']), null, __('Are you sure you want to delete # %s?', $music['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Music'), array('controller' => 'musics', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
