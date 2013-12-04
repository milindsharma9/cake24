<?php

echo($this->Form->create('Upload',array("type"=>"file")));
echo $this->Form->input('Upload.title');
echo $this->Form->input('Upload.filename',array("type"=>"file"));
echo $this->Form->submit();
echo $this->Form->end();

?>
