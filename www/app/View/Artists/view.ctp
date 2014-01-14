<div class="artists view">

	<div class="page-header">
		<h2><?php echo h($artist['Artist']['name']); ?></h2>
	</div>

	<?php echo debug($artist);?>

	<div class="row">
		<div class="col-md-2">
  			<div class="actions">
  				<div>
  					<a href="/musics/add/artist:<?php echo $artist['Artist']['id'];?>">
  						<button type="button" class="btn btn-default">Ajouter musique</button>
  					</a>
  				</div>
  				<div>
  					<a href="/artists/edit/<?php echo $artist['Artist']['id'];?>">
  						<button type="button" class="btn btn-default">Editer artiste</button>
  					</a>
  				</div>
  				<div>
  					<a href="/artists/delete/<?php echo $artist['Artist']['id'];?>">
  						<button type="button" class="btn btn-default"
  								onclick="if (confirm(&quot;Are you sure you want to delete # 8?&quot;)) { document.post.submit(); } event.returnValue = false; return false;">Supprimer artiste</button>
  					</a>
  				</div>
			</div>
		</div>
  		<div class="col-md-10">
  			<div class="related">
				<h3><?php echo __('Related Musics'); ?></h3>
				<?php if (!empty($artist['Music'])): ?>
				<table class="table table-hover table-bordered table-condensed">
				<tr>
					<th><?php echo __('Name'); ?></th>
					<th><?php echo __('Label Id'); ?></th>
					<th><?php echo __('Album Id'); ?></th>
					<th><?php echo __('Youtube'); ?></th>
				</tr>
				<?php foreach ($artist['Music'] as $music): ?>
					<tr>
						<td><?php echo $this->Html->link(__($music['name']), array('controller' => 'musics', 'action' => 'view', $music['id'])); ?></td>
						<td><?php echo $music['label_id']; ?></td>
						<td><?php echo $music['album_id']; ?></td>
						<td><?php echo '<iframe width="420" height="42" src="//www.youtube.com/embed/'.$music['youtube'].'" frameborder="0" allowfullscreen></iframe>'; ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
				<?php endif; ?>
				<?php if (empty($artist['Music'])): ?>
				<div>L'artiste n'a pas encore de musique</div>
				<?php endif; ?>
			</div>
		</div>
  		
	</div>
	
</div>
