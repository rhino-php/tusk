<div class="tables index content stack">
	<div class="table-wrapper">
		<table>
			<caption><?= __('Roles') ?></caption>
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('name') ?></th>
					<th><?= $this->Paginator->sort('created') ?></th>
					<th><?= $this->Paginator->sort('modified') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($roles as $role) : ?>
					<tr>
						<td><?= $this->Number->format($user->id) ?></td>
						<td><?= h($role->name) ?></td>
						<td><?= h($role->created) ?></td>
						<td><?= h($role->modified) ?></td>
						<td class="actions">
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'button float-right']) ?>

	<?= $this->element('pagination') ?>
</div>