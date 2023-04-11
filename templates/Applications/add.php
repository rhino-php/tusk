<h1>Create new Table in Database</h1>
<?php
    echo $this->Form->create(Null, ["class" => "stack"]);
	echo $this->Form->control("name");
	echo $this->Form->control("alias");
?>

<div class="cluster">
	<?php
		echo $this->Form->button('Save');
		echo $this->Html->link("Back", $this->backLink(), ["class" => "button"]);
	?>
</div>

<?= $this->Form->end(); ?>