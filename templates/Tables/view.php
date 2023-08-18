<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $tables
 */
?>
<div class="tables index content stack">
	<div class="table-wrapper">
		<table>
			<caption><?= __(!empty($app['alias']) ? $app['alias'] : $app['name']) ?></caption>
			<thead>
				<tr>
					<?php foreach ($columns as $column) : ?>
						<?php if (!empty($app->overviewData) && !in_array($column, $app->overviewData)) {
							continue;
						} ?>
						<th data-cell="<?= h(ucfirst($column)) ?>"><?= $this->Paginator->sort($column) ?></th>
					<?php endforeach ?>

					<th align="right" data-cell="Actions"><?= __('Actions') ?></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($data as $entry) : ?>
					<tr>
						<?php foreach ($columns as $column) : ?>
							<?php if (!empty($app->overviewData) && !in_array($column, $app->overviewData)) {
								continue;
							} ?>
							<td data-cell="<?= h(ucfirst($column)) ?>"><?= h($entry->{$column}) ?></td>
						<?php endforeach ?>
						<td class="actions" data-cell="Actions">
							<div class="cluster">
								<?= $this->Html->link(
									__('Edit'),
									['action' => 'edit', $tableName, $entry->id],
									['class' => 'button']
								) ?>
								<?= $this->Form->postLink(
									__('Delete'),
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

	<?= $this->element('pagination') ?>
</div>