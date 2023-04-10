<h1>Edit Table in Database</h1>
<?php
    echo $this->Form->create(NULL, ["class" => "stack"]);
?>

<div class="input text">
	<label for="newName">Name</label>
	<input type="text" name="newName" id="newName" value="<?= $data['newName'] ?>">
</div>

<input type="text" name="oldName" value="<?= $data['oldName'] ?>" hidden>
<?php
    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
	echo $this->Html->link("Back", $this->backLink(), ["class" => "button"]);
?>