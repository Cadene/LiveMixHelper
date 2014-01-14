<div class="kinds form">
<?php echo $this->Form->create('Kind'); ?>
	<fieldset>
		<legend><?php echo __('Edit Kind'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('Music');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Kind.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Kind.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kinds'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Musics'), array('controller' => 'musics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Music'), array('controller' => 'musics', 'action' => 'add')); ?> </li>
	</ul>
</div>
