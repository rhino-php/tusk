<h1><?= __("New Content in {name}", ['name' => $page['name']]) ?></h1>

<?php
    echo $this->Form->create($entry, ["class" => "stack"]);
	echo $this->Form->allControls([
		'page_id' => false,
		'created' => false,
		'modified' => false
	]);
	echo $this->Form->hidden('page_id', ['value' => $page['id']]);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>