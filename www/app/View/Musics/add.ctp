<div class="musics form">
<?php echo $this->Form->create('Music',array('class'=>"form-horizontal")); ?>
	<fieldset>
		<legend><?php echo __('Add Music'); ?></legend>
		<div class="form-group">
			<?php echo $this->Form->input('music_file', array(
				'type' => 'file', 'label'=>'Fichier mp3','class'=>'form-control'
			));?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('name', array(
				'label'=>'Titre','class'=>'form-control'
			));?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('Artist', array(
				'label'=>'Artiste(s)','class'=>'form-control'
			));?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('Kind', array(
				'label'=>'Genre(s)','class'=>'form-control'
			));?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('youtube', array(
				'label'=>'Url youtube','class'=>'form-control'
			));?>
		</div>
	<?php	
		echo $this->Form->input('label_id');
		echo $this->Form->input('album_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
