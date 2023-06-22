<h1>New</h1>
<?php
    echo $this->Form->create($entry, ["class" => "stack"]);
	echo $this->Form->allControls();
    echo $this->Form->button(__('Save Entry'));
    echo $this->Form->end();
?>