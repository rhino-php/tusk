<div>
	<h1>Settings for <?= $tableName ?></h1>
	
	<?= $this->Form->create($entry, ["class" => "stack"]); ?>
		<?= $this->Form->control('nav_group_id', [
			"type" => "select",
			"options" => $groups
		]); ?>

		<?= $this->Form->control('visible', ["type" => "checkbox"]) ?>
		<?= $this->Form->hidden('name', ["value" => $tableName]) ?>
	
		<div class="cluster">
			<?= $this->Form->button('Save') ?>
			<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
		</div>

	<?= $this->Form->end(); ?>
</div>