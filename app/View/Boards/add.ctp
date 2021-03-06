<div class="boards form">
<?php echo $this->Form->create('Board', array('type' => 'file', 'enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Add Board'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('content');
        echo $this->Form->input('img', array('type' => 'file'));
        echo $this->Form->error('img_pass');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Boards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
</div>
