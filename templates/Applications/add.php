<div>
	<h1>Create new Table</i></h1>

	<?= $this->Form->create(null, ["class" => "stack"]); ?>
	<?= $this->Form->control('name') ?>
	<?= $this->Form->control('alias') ?>

	<?= $this->Form->control('tusk_group_id', [
		"type" => "select",
		"options" => $groups
	]); ?>

	<?= $this->Form->control('active', ["type" => "checkbox", "checked" => true]) ?>

	<div class="cluster">
		<?= $this->Form->button('Save') ?>
		<?= $this->Html->link("Back", ['action' => 'index'], ["class" => "button"]) ?>
	</div>

	<?= $this->Form->end(); ?>
</div>