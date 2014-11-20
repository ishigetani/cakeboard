<div class="boards view">
<h2><?php echo __('Board'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($board['Board']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($board['User']['name'], array('controller' => 'users', 'action' => 'view', $board['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($board['Board']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($board['Board']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($board['Board']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
    <br />
    <?php if (!empty($board['Board']['img_pass'])): ?>
        <?php echo $this->Html->image($board['Board']['img_pass']); ?>
    <?php endif; ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Board'), array('action' => 'edit', $board['Board']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Board'), array('action' => 'delete', $board['Board']['id']), array(), __('Are you sure you want to delete # %s?', $board['Board']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Boards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
