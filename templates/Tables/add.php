<h1>New</h1>
<?php
    echo $this->Form->create($entry, ["class" => "stack"]);
	foreach ($columns as $column) {
		echo $this->Form->control($column);
	}
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>