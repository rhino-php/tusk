<?php foreach ($pages as $page) : ?>
	<li class="page-item">
		<div class="page-item__body">
			<?= $this->Html->link($page['name'], ['action' => 'layout', $page['id']]) ?>

			<div>
				<?= $this->Html->link('edit', ['action' => 'change', $page['id']], ['class' => 'button']) ?>
				<?= $this->Form->postLink(
					__('Delete'),
					['action' => 'delete', $page['id']],
					['confirm' => __('Are you sure you want to delete # {0}?', $page['name']), 'class' => 'button']
				) ?>
			</div>
		</div>

		<?php if (!empty($page['children'])) : ?>
			<ul>
				<?= $this->element('Pages/page_item', [
					'pages' => $page['children']
				]) ?>
			</ul>
		<?php endif ?>
	</li>
<?php endforeach ?>