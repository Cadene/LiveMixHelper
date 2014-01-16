<div class="musics index">

	<?php echo $this->element('page-header',array('title'=>'Musiques','add'=>'Ajouter une musique')); ?>

	<div class="actions">
		<input type="text" id="name" class="form-control" placeholder="Chercher une musique">
	</div>

	<hr>

	<?php //debug($musics);?>

	<div class="musics-table">
		<table class="table table-hover table-bordered table-condensed">
			<tr>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th>Artiste(s)</th>
					<th>Label</th>
					<th>Ecoute</th>
					<th>Genre(s)</th>
			</tr>
			<?php foreach ($musics as $music): ?>
			<tr>
				<td><?php echo $this->Html->link(__($music['Music']['name']), array('action' => 'view', $music['Music']['id'])); ?></td>
				<td>
					<?php foreach ($music['Artist'] as $artist): ?>
						<?php echo $this->Html->link(__($artist['name']),
								array('controller' => 'artists', 'action' => 'view', $artist['id'])).' '; ?>
					<?php endforeach; ?>
				</td>
				<td>
					<?php if (!is_null($music['Label']['id'])): ?>
						<?php echo $this->Html->link($music['Label']['name'], array('controller' => 'labels', 'action' => 'view', $music['Label']['id'])); ?>
					<?php endif; ?>
					<?php if (is_null($music['Label']['id'])): ?>Unsigned<?php endif; ?>
				</td>
				<td>
					<?php echo '<iframe width="420" height="42" src="//www.youtube.com/embed/'.h($music['Music']['youtube']).'" frameborder="0" allowfullscreen></iframe>'; ?>
					&nbsp;
				</td>
				<td>
					<?php foreach ($music['Kind'] as $kind): ?>
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
</div>
