<?php
	echo $this->Form->create($entry, ["class" => "modal-form"]);
	echo $this->Form->allControls([
		'page_id' => false,
		'active' => false,
		'position' => false,
		'created' => false,
		'modified' => false
	]);
	echo $this->Form->button(__('Save'), ['class' => 'tusk-button']);
	echo $this->Form->end();
?>