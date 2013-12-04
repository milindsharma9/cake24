<?php
echo($this->Session->flash());
echo $this->Form->create('User');

echo $this->Form->input('User.username');
echo $this->Form->input('User.password');

echo $this->Form->submit();
?>

<?php echo $this->Form->end(); ?>	