<div class="stack">
	<h1><?= $tableName ?></h1>

	<table>
		<tr>
			<?php foreach ($rows as $row) : ?>
				<th><?= $row ?></th>
			<?php endforeach ?>
			<th>Actions</th>
		</tr>
		<?php foreach ($columns as $column) : ?>
			<tr>
				<?php foreach ($rows as $row) : ?>
					<td><?= $column[$row] ?></td>
				<?php endforeach ?>
				<td>
					<?= $this->Html->link("rename", ["action" => 'rename', $tableName, $column["Field"]]) ?>
					<?= $this->Html->link("delete", ["action" => 'delete', $tableName, $column["Field"]]) ?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>

	<?= $this->Html->link("Add Cloumn", ["controller" => "Fields", "action" => "add", $tableName], ["class" => "button"]) ?>
	<?= $this->Html->link("Back", $this->backLink(), ["class" => "button"]); ?>
</div>