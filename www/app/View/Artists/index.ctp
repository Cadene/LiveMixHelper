<div class="artists index">

	<div class="page-header">
		<h2><?php echo __('Artistes :: '); ?><small><a href="/artists/add"><button type="button" class="btn btn-default">Ajouter un artiste</button></a></small></h2>
	</div>

	<div class="actions">
		<input type="text" id="name" class="form-control" placeholder="Chercher un artiste">
	</div>

	<hr>

	<table class="table table-hover table-bordered table-condensed">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($artists as $artist): ?>
	<tr>
		<td><?php echo h($artist['Artist']['id']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $artist['Artist']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $artist['Artist']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $artist['Artist']['id']), null, __('Are you sure you want to delete # %s?', $artist['Artist']['name'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	
	<ul class="pagination">
	<?php
		echo $this->Paginator->prev('<<', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '|'));
		echo $this->Paginator->next('>>', array(), null, array('class' => 'next disabled'));
	?>
	</ul>
</div>

