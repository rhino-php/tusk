<div class="tables index content stack">

	<div class="table-wrapper">
		<table>
			<caption><?= __('Application-Manager') ?></caption>
			<thead>
				<tr>
					<th colspan="2">Table</th>
					<th>Actions</th>
				</tr>
			</thead>

			<tbody>
				<?php if (empty($groups)) : ?>
					<tr>
						<td colspan="3" align="center">
							No Applications found.
						</td>
					</tr>
				<?php endif ?>

				<?php foreach ($groups as $group) : ?>
					<tr>
						<td colspan="2"><b><?= $group['name'] ?></b></td>
						<td>
							<?php if (isset($group['id'])) : ?>
								<?= $this->Html->link(
									"edit",
									["action" => 'renameGroup', $group['id']],
									['class' => 'button']
								) ?>
								<?= $this->Html->link(
									"delete",
									["action" => 'deleteGroup', $group['id']],
									['class' => 'button']
								) ?>
							<?php endif ?>
						</td>
					</tr>
					<?php foreach ($group['applications'] as $table) : ?>
						<tr>
							<td>
								<?= $this->Html->link(
									isset($table['alias']) ? $table['alias'] : $table['name'],
									["controller" => "Tables", "action" => 'view', $table['name']],
									// ['class' => 'button']
								) ?>
							</td>
							<td colspan="2">
								<?= $this->Html->link(
									"fields",
									["controller" => "Fields", "action" => 'index', $table['name']],
									['class' => 'button']
								) ?>
								<?= $this->Html->link(
									"edit",
									["action" => 'edit', $table['name']],
									['class' => 'button']
								) ?>

								<?= $this->Form->postLink(
									__('Delete'),
									['action' => 'delete', $table['name']],
									['confirm' => __('Are you sure you want to delete: {0}?', $table['name']), 'class' => 'button']
								) ?>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	<?= $this->Html->link("Create new Table", ["action" => "add"], ["class" => "button"]) ?>
	<?= $this->Html->link("Create new Group", ["action" => "newGroup"], ["class" => "button"]) ?>
</div>