<?php 
$options = [];

if (isset($readonly) && $readonly) {
	$options['readonly'] = true;
}

?>

<h1><?= $title ?></h1>
<?= $this->Form->create($entry, ["class" => "stack--300"]); ?>

<?= $this->Fields->render($fields, $entry, $options) ?>

<div class="cluster">
	<?php if($action != 'view') :?>
	<?= $this->Form->button(__('Save Entry')); ?>
	<?php endif ?>
	<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
</div>

<?= $this->Form->end(); ?>