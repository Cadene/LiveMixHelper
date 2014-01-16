<?php echo $this->element('page-header',array('title'=>'Ajouter un genre')); ?>

<div class="kinds form">
	<?php echo $this->Form->create('Kind'); ?>
		<fieldset>
			<div class="form-group">
				<?php echo $this->Form->input('name', array(
					'label'=>'Name *','class'=>'form-control'
				));?>
			</div>
		</fieldset>
		<center><button type="submit" class="btn btn-default">Ajouter</button></center>
</form>
</div>
