<h1>Edit</h1>
<?php
    echo $this->Form->create($entry, ["class" => "stack"]);
	foreach ($columns as $column) {
		echo $this->Form->control($column);
	}
    // echo $this->Form->control('user_id', ['type' => 'hidden']);
    // echo $this->Form->control('title');
    // echo $this->Form->control('body', ['rows' => '3']);
	// echo $this->Form->control('tags._ids', ['options' => $tags]);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>