	<h1>Edit User</h1>
	<?= $this->Form->create($entry, ["class" => "stack"]); ?>

	<?php
	echo $this->Form->allControls();
	?>

	<div class="table">
		<table>
			<tr>
				<th></th>
				<?php foreach ($accessTypes as $type) : ?>
					<th>
						<?= $type ?>
					</th>
				<?php endforeach ?>
			</tr>
			<?php foreach ($applications as $application) : ?>
				<tr>
					<th><?= $application ?></th>
					<?php foreach ($accessTypes as $type) : ?>
						<th>
							<?= $this->Form->checkbox($application . "_" . $type, ['checked' => isset($entry->access[$application . "_" . $type]) ? $entry->access[$application . "_" . $type] : 0 ]) ?>
						</th>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>

	</div>