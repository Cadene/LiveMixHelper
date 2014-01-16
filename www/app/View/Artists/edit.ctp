<div class="artists form">
<?php echo $this->Form->create('Artist'); ?>
	<fieldset>
		<legend><?php echo __('Editer artiste'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('desc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

