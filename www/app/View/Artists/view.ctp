<div class="artists view">

	<?php echo $this->element('page-header',array('title'=>$artist['Artist']['name'])); ?>

	<?php //echo debug($artist);?>

	<div class="row">
		<div class="col-md-2">
  			<div class="actions">
  				<div>
  					<a href="/artists/add/artist:<?php echo $artist['Artist']['id'];?>">
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
  			<div class="desc">
  				<?php if(!empty($artist['Artist']['desc'])){
  					echo $artist['Artist']['desc'];
  				}else{
  					echo "Pas de description pour cet artiste.";
  				}?>
  			</div>
		</div>
	</div>

	<div class="related">
		<h3><?php echo __('Related Musics'); ?></h3>
		<div class="musics-table">
			<table class="table table-hover table-bordered table-condensed">
				<tr>
					<th>Name</th>
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

		</div>
	</div>
	
</div>
