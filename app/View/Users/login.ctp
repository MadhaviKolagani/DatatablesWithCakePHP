<div>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset align="left">
       <!-- <legend>
            <?php echo __('Please enter your username and password'); ?>
       </legend>-->
       <?php echo $this->Form->input('username',array('type'=>'text','maxlength'=>20,'style'=>'width:200px;height:20px'));
        	 echo $this->Form->input('password',array('type'=>'text','maxlength'=>20,'style'=>'width:200px;height:20px')); ?>
	</fieldset>
			 <?php echo $this->Html->link('Create Account',array('controller' => 'users', 'action' => 'add'));
			 echo $this->Form->end(__('Login')); ?>
	
</div>