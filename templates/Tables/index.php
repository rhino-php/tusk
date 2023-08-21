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
							<div class="pill cluster-end">
								<?php if (in_array('view', $rights)) {
									echo $this->Html->link(
										$this->svg("Tusk.eye"),
										['action' => 'view', $tableName, $entry->id],
										['escape' => false, 'title' => __("View Entry"), 'class' => 'button']
									);
								} 
								?>
								<?php if (in_array('edit', $rights)) {
									echo $this->Html->link(
										$this->svg("Tusk.edit"),
										['action' => 'edit', $tableName, $entry->id],
										['escape' => false, 'title' => __("Edit Entry"), 'class' => 'button']
									);
								} ?>
								<?php if (in_array('delete', $rights)) {
									echo $this->Form->postLink(
										$this->svg("Tusk.trash"),
										['action' => 'delete', $tableName, $entry->id],
										['confirm' => __('Are you sure you want to delete # {0}?', $entry->id), 'escape' => false, 'title' => __("Delete Entry"),  'class' => 'button']
									);
								} ?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<div class="cluster">
		<?php
		if (in_array('add', $rights)) {
			$newButton = $this->svg("Tusk.plus") . '<span>' . __('New Entry') . '</span>';
			echo $this->Html->link($newButton, ['action' => 'add', $tableName], ['escape' => false, 'class' => 'button icon-button']);
		 } ?>
	</div>

	<?= $this->element('pagination') ?>
</div>