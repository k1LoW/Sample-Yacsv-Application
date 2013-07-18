<div class="posts form">
<?php echo $this->Form->create('Post', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Import Posts'); ?></legend>
		<?php if (!empty($importValidationErrors)): ?>
		<?php foreach($importValidationErrors as $i => $error): ?>
		<p>ヘッダを除いて<?php echo $i; ?>行目</p>
		<?php pr($error); ?>
		<?php endforeach; ?>
		<?php endif; ?>
	<?php
		echo $this->Form->input('csvfile', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
	</ul>
</div>
