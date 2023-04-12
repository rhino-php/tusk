<h1><?= __("New Content in {name}", ['name' => $page['name']]) ?></h1>


<?php
    echo $this->Form->create($entry, ["class" => "stack"]);
	echo $this->Form->allControls();
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>