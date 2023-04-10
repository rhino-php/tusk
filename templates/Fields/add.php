<h1>Add Field to <?= $tableName ?></h1>
<?= $this->Form->create(Null, ["class" => "stack"]) ?>

	<div class="stack--200">
		<?= $this->Form->control("name", ["required"]) ?>
	</div>

	<div class="stack--200">
		<?= $this->Form->control('type', ["type" => "select", "options" => $types, "required"]); ?>
	</div>

	<div class="stack--200">
		<?= $this->Form->control('comment', ["type" => "textarea"]); ?>
	</div>
	

	<details class="stack--200">
		<summary>More options</summary>
		
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
		<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]) ?>
	</div>

	<?= $this->Form->hidden('table', ["value" => $tableName]) ?>

<?= $this->Form->end(); ?>