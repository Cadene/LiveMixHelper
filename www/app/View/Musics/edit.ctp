<?php echo $this->element('page-header',array('title'=>'Editer une musique')); ?>

<div class="musics form">
	<?php echo $this->Form->create('Music',array('class'=>"form-horizontal")); ?>
		<fieldset>
			<?php echo $this->Form->input('id');?>
			<div class="form-group">
				<?php echo $this->Form->input('name', array(
					'label'=>'Titre *','class'=>'form-control'
				));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('Artist', array(
					'label'=>'Artiste(s) *','class'=>'form-control'
				));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('Kind', array(
					'label'=>'Genre(s) *','class'=>'form-control'
				));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('youtube', array(
					'label'=>'Url youtube *','class'=>'form-control'
				));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('label_id', array(
					'label'=>'Label','class'=>'form-control'
				));?>
			</div>
		</fieldset>
		<center><button type="submit" class="btn btn-default">Ajouter</button></center>
	</form>
</div>
