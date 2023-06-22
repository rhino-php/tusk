<div>
	<h1>Edit Table: <i><?= $tableName ?></i></h1>

	<?= $this->Form->create($entry, ["class" => "stack"]); ?>
	<?= $this->Form->control('name') ?>
	<?= $this->Form->control('alias') ?>

	<?= $this->Form->control('tusk_group_id', [
		"type" => "select",
		"options" => $groups
	]); ?>

	<?= $this->Form->control('active', ["type" => "checkbox"]) ?>
	<?= $this->Form->hidden('currentName', ["value" => $tableName]) ?>

	<div class="cluster">
		<?= $this->Form->button('Save') ?>
		<?= $this->Html->link("Back", ['action' => 'index'], ["class" => "button"]) ?>
	</div>

	<?= $this->Form->end(); ?>
</div>