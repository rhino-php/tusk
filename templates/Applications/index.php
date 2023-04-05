<div>

	<table>
		<tr>
			<th>Table</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($applications as $table) : ?>
		<tr>
			<td><?= $table ?></td>
			<td>
				<?= $this->Html->link("view", ["action" => 'view', $table]) ?>
				<?= $this->Html->link("edit", ["action" => 'edit', $table]) ?>
				<?= $this->Html->link("delete", ["action" => 'delete', $table]) ?>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	
	<?= $this->Html->link("Create new Table", ["action" => "add"], ["class" => "button"]) ?>
</div>