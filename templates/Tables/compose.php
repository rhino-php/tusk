<h1><?= $title ?></h1>
<?php $this->loadHelper('Tusk.Fields'); ?>
<?= $this->Form->create($entry, ["class" => "stack"]); ?>

<?= $this->Fields->render($fields, $entry) ?>

<div class="cluster">
	<?= $this->Form->button(__('Save Entry')); ?>
	<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
</div>

<?= $this->Form->end(); ?>