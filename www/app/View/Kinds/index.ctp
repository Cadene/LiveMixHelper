<div class="kinds index">

	<?php echo $this->element('page-header',array('title'=>'Genres','add'=>'Ajouter un genre')); ?>
	
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
			<td>
				<?php echo $this->Html->link(__($kind['Kind']['name']), array(
					'action' => 'view', $kind['Kind']['id']
				)); ?>
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