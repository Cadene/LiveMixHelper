<div class="kinds index">

	<div class="page-header">
		<h2><?php echo __('Genres :: '); ?><small><a href="/kinds/add"><button type="button" class="btn btn-default">Ajouter un genre</button></a></small></h2>
	</div>
	
	<div class="actions">
		<input type="text" id="name" class="form-control" placeholder="Chercher un genre">
	</div>

	<hr>

	<table class="table table-hover table-bordered table-condensed">
		<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
		</tr>
		<?php foreach ($kinds as $kind): ?>
		<tr>
			<td><?php echo h($kind['Kind']['name']); ?>&nbsp;</td>
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