<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $tables
 */
?>
<div class="tables index content stack">
	
	<div class="table-wrapper">
		<table>
			<caption><?= __($tableName) ?></caption>
			<thead>
				<tr>
					<?php foreach($columns as $column) : ?>
						<th data-cell="<?= h(ucfirst($column)) ?>"><?= $this->Paginator->sort($column) ?></th>
					<?php endforeach ?>
						
					<th data-cell="Actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($data as $entry): ?>
				<tr>
					<?php foreach($columns as $column) : ?>
						<td data-cell="<?= h(ucfirst($column)) ?>"><?= h($entry->{$column}) ?></td>
					<?php endforeach ?>
					<td class="actions" data-cell="Actions">
						<div class="cluster">
							<?= $this->Html->link(__('Edit'),
								['action' => 'edit', $tableName, $entry->id],
								['class' => 'button']
							) ?>
							<?= $this->Form->postLink(__('Delete'),
								['action' => 'delete', $tableName, $entry->id],
								['confirm' => __('Are you sure you want to delete # {0}?', $entry->id), 'class' => 'button']
							) ?>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="cluster">
		<?= $this->Html->link(__('new'), ['action' => 'add', $tableName], ['class' => 'button']) ?>
	</div>

    <div class="paginator stack">
		<p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        <ul class="pagination cluster list-style-none">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
