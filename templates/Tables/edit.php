<h1>Edit</h1>
<?= $this->Form->create($entry, ["class" => "stack"]); ?>

<?php
	echo $this->Form->allControls();
    echo $this->Form->button(__('Save Entry'));
?>

<?= $this->Form->end(); ?>