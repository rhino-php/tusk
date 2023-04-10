<div class="stack">
	<table>
		<tr>
			<th>Table</th>
			<th></th>
			<th>Actions</th>
		</tr>

		<?php foreach ($groups as $group) : ?>
		<tr>
			<td colspan="2"><b><?= $group['name'] ?></b></td>
			<td>
				<?php if (isset($group['id'])) : ?>
				<?= $this->Html->link("rename", ["action" => 'renameGroup', $group['id']]) ?>
				<?= $this->Html->link("delete", ["action" => 'deleteGroup', $group['id']]) ?>
				<?php endif ?>
			</td>
		</tr>
			<?php foreach ($group['applications'] as $table) : ?>
			<tr>
				<td></td>
				<td><?= $table['name'] ?></td>
				<td>
					<?= $this->Html->link("view", ["controller" => "Tables", "action" => 'view', $table['name']]) ?>
					<?= $this->Html->link("fields", ["controller" => "Fields", "action" => 'index', $table['name']]) ?>
					<?= $this->Html->link("rename", ["action" => 'rename', $table['name']]) ?>
					<?= $this->Html->link("delete", ["action" => 'delete', $table['name']]) ?>
					<?= $this->Html->link("settings", ["action" => 'edit', $table['name']]) ?>
				</td>
			</tr>
			<?php endforeach ?>
		<?php endforeach ?>
	</table>

	<ul>
		<?php foreach ($groups as $group) {
			echo $group['name'];
		} ?>
	</ul>
	
	<?= $this->Html->link("Create new Table", ["action" => "add"], ["class" => "button"]) ?>
	<?= $this->Html->link("Create new Group", ["action" => "newGroup"], ["class" => "button"]) ?>
</div>