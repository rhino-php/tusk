<h1>Edit</h1>
<?= $this->Form->create($entry, ["class" => "stack"]); ?>

<?= $this->Fields->render($fields, $entry) ?>

<div class="cluster">
	<?= $this->Form->button(__('Save Entry')); ?>
	<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
</div>

<?= $this->Form->end(); ?>