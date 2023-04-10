<h1>Edit Field in Table <?= $tableName ?></h1>
<?= $this->Form->create(NULL, ["class" => "stack"]); ?>

	<?= $this->Form->control('newName', ["value" => $data["newName"]]) ?>
	
	<div class="cluster">
		<?= $this->Form->button('Save') ?>
		<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
	</div>
	
	<?= $this->Form->hidden('oldName', ["value" => $data["oldName"]]) ?>
	<?= $this->Form->hidden('table', ["value" => $tableName]) ?>
<?= $this->Form->end(); ?>