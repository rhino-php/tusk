<?php
	echo $this->Form->create($entry, ["class" => "stack modal-form"]);
	echo $this->Form->allControls([
		'page_id' => false,
		'created' => false,
		'modified' => false
	]);
	echo $this->Form->hidden('page_id', ['value' => $pageId]);
	echo $this->Form->button(__('Save'), ['class' => 'tusk-button']);
	echo $this->Form->end();
?>