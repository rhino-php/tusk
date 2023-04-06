<h1>Add Field to <?= $tableName ?></h1>
<?= $this->Form->create(Null, ["class" => "stack"]) ?>
	<?= $this->Form->control("field") ?>
	<?= $this->Form->control("type") ?>
	<?= $this->Form->control("null") ?>
	
	<div class="cluster">
		<?= $this->Form->button('Save') ?>
		<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
	</div>
	
	<?= $this->Form->hidden('table', ["value" => $tableName]) ?>
<?= $this->Form->end(); ?>