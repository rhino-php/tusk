<div>
	<h1>Settings for <?= $tableName ?></h1>
	
	<?= $this->Form->create($entry, ["class" => "stack"]); ?>
		<?= $this->Form->control('tusk_group_id', [
			"type" => "select",
			"options" => $groups
		]); ?>

		<?= $this->Form->control('active', ["type" => "checkbox"]) ?>
		<?= $this->Form->hidden('name', ["value" => $tableName]) ?>
	
		<div class="cluster">
			<?= $this->Form->button('Save') ?>
			<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
		</div>

	<?= $this->Form->end(); ?>
</div>