<div class="musics view">

	<?php echo $this->element('page-header',array(
		'title'=>$music['Music']['name'],
		'edit' => "Editer cette musique",
		'del' => "Supprimer cette musique",
		'id' => $music['Music']['id']
	)); ?>

	<?php //debug($music);?>
	
	<dl>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo $this->Html->link($music['Label']['name'], array('controller' => 'labels', 'action' => 'view', $music['Label']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Album'); ?></dt>
		<dd>
			<?php echo $this->Html->link($music['Album']['name'], array('controller' => 'albums', 'action' => 'view', $music['Album']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Youtube'); ?></dt>
		<dd>
			<?php echo '<iframe width="420" height="315" src="//www.youtube.com/embed/'.h($music['Music']['youtube']).'" frameborder="0" allowfullscreen></iframe>'; ?>
			&nbsp;
		</dd>
	</dl>

	<div class="related-artists">
		<h3><?php echo __('Related artists'); ?></h3>
		<?php foreach ($music['Artist'] as $artist): ?>
			<?php echo $this->Html->link(__($artist['name']),
					array('controller' => 'artists', 'action' => 'view', $artist['id'])).' '; ?>
		<?php endforeach; ?>
	</div>

	<div class="related-kinds">
		<h3><?php echo __('Related kinds'); ?></h3>
		<?php foreach ($music['Kind'] as $kind): ?>
			<?php echo $this->Html->link(__($kind['name']),
					array('controller' => 'kinds', 'action' => 'view', $kind['id'])).' '; ?>
		<?php endforeach; ?>
	</div>
		

</div>
