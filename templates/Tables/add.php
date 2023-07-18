<h1>Add</h1>
<?php $this->loadHelper('Tusk.Fields'); ?>
<?= $this->Form->create($entry, ["class" => "stack"]); ?>

<?= $this->Fields->render($fields['fields'], $entry) ?>

<?php foreach ($fields['columns'] as $column) {
	echo $this->Form->control($column);
} ?>

<div class="cluster">
	<?= $this->Form->button(__('Save Entry')); ?>
	<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
</div>

<?= $this->Form->end(); ?>