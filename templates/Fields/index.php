<div class="stack">
	<h1><?= $tableName ?></h1>
	<div class="table-wrapper">
		<table>
			<caption><?= __('Table fields') ?></caption>
			<tr>
				<?php foreach ($rows as $row) : ?>
					<th><?= $row ?></th>
				<?php endforeach ?>
				<th>Actions</th>
			</tr>
			<?php if (!empty($columns)) : ?>
			<?php foreach ($columns as $column) : ?>
				<tr>
					<?php foreach ($rows as $row) : ?>
						<td><?= $column[$row] ?></td>
					<?php endforeach ?>
					<td>
						<?= $this->Html->link("edit", ["action" => 'edit', $tableName, $column["Field"]]) ?>
						<?= $this->Html->link("delete", ["action" => 'delete', $tableName, $column["Field"]]) ?>
					</td>
				</tr>
			<?php endforeach ?>
			<?php endif ?>
		</table>
	</div>

	<?= $this->Html->link("Add Cloumn", ["controller" => "Fields", "action" => "add", $tableName], ["class" => "button"]) ?>
	<?= $this->Html->link("Back", ['controller' => 'applications'], ["class" => "button"]); ?>
</div>