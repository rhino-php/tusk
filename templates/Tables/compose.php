<h1><?= $title ?></h1>
<?= $this->Form->create($entry, ["class" => "stack--300"]); ?>

<?= $this->Fields->render($fields, $entry) ?>

<div class="cluster">
	<?= $this->Form->button(__('Save Entry')); ?>
	<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
</div>

<?= $this->Form->end(); ?>