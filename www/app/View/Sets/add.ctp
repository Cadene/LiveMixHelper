<div class="sets form">
<?php echo $this->Form->create('Set'); ?>
	<fieldset>
		<legend><?php echo __('Add Set'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('user_id');
		echo $this->Form->input('Music');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Musics'), array('controller' => 'musics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Music'), array('controller' => 'musics', 'action' => 'add')); ?> </li>
	</ul>
</div>
