<?php
echo($this->Session->flash());
echo $this->Form->create('User');

echo $this->Form->input('username');
echo $this->Form->input('password');

echo $this->Form->submit();
?>

<?php echo $this->Form->end(); ?>	