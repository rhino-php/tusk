<?php foreach ($pages as $page): ?>
	<li style="padding-left: 1rem">
		<?= $page['name'] ?>
		<?= $this->Html->link('edit', ['action' => 'change', $page['id']]) ?>
		<?= $this->Html->link('layout', ['action' => 'edit', $page['id']]) ?>
		
		<?php if (!empty($page['children'])) : ?>
			<ul>
				<?= $this->element('Pages/page_item', [
					'pages' => $page['children']
				]) ?>
			</ul>
		<?php endif ?>
	</li>
<?php endforeach ?>