<?php
	echo $this->Form->create($entry, ["class" => "modal-form"]);
	echo $this->Form->control('text');
	echo $this->Form->control('html');
	echo $this->Form->control('element_id');
	echo $this->Form->button(__('Save'), ['class' => 'tusk-button']);
	echo $this->Form->end();
?>

<div id="editor"></div>