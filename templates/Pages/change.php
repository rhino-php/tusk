<h1>Page</h1>
<?php
    echo $this->Form->create($entry, ["class" => "stack"]);
	echo $this->Form->allControls([
		'created' => false,
		'modified' => false
	]);
    echo $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'button']);
    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
?>