<div class="artists index">

	<div class="page-header">
		<h2><?php echo __('Artistes :: '); ?><small><a href="/artists/add"><button type="button" class="btn btn-default">Ajouter un artiste</button></a></small></h2>
	</div>

	<?php //debug($artists);?>

	<div class="actions">
		<input type="text" id="name" class="form-control" placeholder="Chercher un artiste">
	</div>

	<hr>

	<table class="table table-hover table-bordered table-condensed">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th>Genre(s)</th>
	</tr>
	<?php foreach ($artists as $artist): ?>
	<tr>
		<td>
			<?php echo $this->Html->link(__($artist['Artist']['name']), array('action' => 'view', $artist['Artist']['id'])); ?>
		</td>
		<td>
			<?php foreach ($artist['Kind'] as $kind): ?>
				<?php echo $this->Html->link(__($kind['name']),
						array('controller' => 'kinds', 'action' => 'view', $kind['id'])).' '; ?>
			<?php endforeach; ?>
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

