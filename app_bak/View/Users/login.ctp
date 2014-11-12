<h2>UserLogin</h2>
<?php
		echo $this->Session->flash('auth');
		echo $this->Form->create('User');
		echo $this->Form->input('login_name',array('label'=>'LoginName'));
		echo $this->Form->input('password',array('type'=>'password','label'=>'Password'));
		echo $this->Form->end('Login');
?>