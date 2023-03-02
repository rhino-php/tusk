<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $tables
 */
?>
<div class="tables index content stack">
	
	<h3><?= __(ucfirst($table)) ?></h3>

	<div class="cluster">
		<?= $this->Html->link(__('back'), ['action' => 'index'], ['class' => 'button']) ?>
		<?= $this->Html->link(__('new'), ['action' => 'add'], ['class' => 'button']) ?>
	</div>
	
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
					<?php foreach($columns as $column) : ?>
						<th><?= $this->Paginator->sort($column) ?></th>
					<?php endforeach ?>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $table): ?>
                <tr>
					<?php foreach($columns as $column) : ?>
						<td><?= h($table->{$column}) ?></td>
					<?php endforeach ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $table->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $table->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $table->id], ['confirm' => __('Are you sure you want to delete # {0}?', $table->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination cluster list-style-none">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
