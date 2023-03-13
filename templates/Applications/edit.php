<h1>Edit Table in Database</h1>
<?php
    echo $this->Form->create(Null, ["class" => "stack"]);
	echo $this->Form->control("alias");
	echo $this->Form->control("name");
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>