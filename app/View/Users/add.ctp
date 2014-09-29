<div>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
		$options = array('admin' => 'Admin', 'author' => 'Author');
		$attributes = array('value'=>'author','legend'=>'Responsibility','between'=>'Pick a suitable role');
		echo $this->Form->radio('role', $options,$attributes);
        /*echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')*/
        // );
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>