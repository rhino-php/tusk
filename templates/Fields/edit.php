<h1>Edit Field <i><?= $entry->name ?></i> in Table: <i><?= $tableName ?></i></h1>
<?= $this->Form->create($entry, ["class" => "stack"]); ?>

<div class="stack--200">
	<?= $this->Form->control("name", ["required"]) ?>
</div>

<div class="stack--200">
	<?= $this->Form->control("alias") ?>
</div>

<div class="stack--200">
	<?= $this->Form->control("position", ["value" => $entry->position ?: 0 ]) ?>
</div>

<div class="stack--200">
	<?= $this->Form->control("active", ["value" => $entry->active ?: 1 ]) ?>
</div>

<div class="stack--200">
	<?= $this->Form->control('type', ["type" => "select", "options" => $types, "required", 'value' => $entry->Type]); ?>
</div>

<div class="stack--200">
	<?= $this->Form->control('description', ["type" => "textarea"]); ?>
</div>



<details class="stack--200">
	<summary>More options</summary>

	<div class="stack--200">
		<?= $this->Form->control('comment', ["type" => "textarea"]); ?>
	</div>

	<div class="stack--200">
		<?= $this->Form->control('null', ["type" => "checkbox"]); ?>
	</div>

	<div class="stack--200">
		<?= $this->Form->control("default") ?>
	</div>

	<div class="stack--200">
		<?= $this->Form->control('limit', ["type" => "number"]); ?>
	</div>

	<div class="stack--200">
		<?= $this->Form->control('after', ["type" => "select", "options" => $columns]); ?>
	</div>

	<div class="stack--200">
		<?= $this->Form->control('signed', ["type" => "checkbox"]); ?>
	</div>

	<details class="stack--200">
		<summary>For decimal:</summary>

		<div class="stack--200">
			<?= $this->Form->control('precision'); ?>
		</div>

		<div class="stack--200">
			<?= $this->Form->control('scale'); ?>
		</div>
	</details>

	<details class="stack--200">
		<summary>For enum and set:</summary>

		<div class="stack--200">
			<?= $this->Form->control('values'); ?>
		</div>
	</details class="stack--200">

	<details class="stack--200">
		<summary>For timestamp:</summary>

		<div class="stack--200">
			<?= $this->Form->control('current_time', ["type" => "checkbox"]); ?>
		</div>

		<div class="stack--200">
			<?= $this->Form->control('update', ["type" => "checkbox"]); ?>
		</div>

		<div class="stack--200">
			<?= $this->Form->control('timezone'); ?>
		</div>
	</details>
</details>

<div class="cluster">
	<?= $this->Form->button('Save') ?>
	<?= $this->Html->link("Back", ['action' => 'index', $tableName], ["class" => "button"]) ?>
</div>

<?= $this->Form->hidden('currentName', ["value" => $entry["name"]]) ?>
<?= $this->Form->hidden('tableName', ["value" => $tableName]) ?>
<?= $this->Form->end(); ?>