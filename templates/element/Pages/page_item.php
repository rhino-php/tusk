<li style="padding-left: 1rem">
	<?= $page['name'] ?>
	<?= $this->Html->link('edit', ['action' => 'change', $page['id']]) ?>
	<?php if (!empty($page['children'])) : ?>
		<ul>
			<?php foreach ($page['children'] as $child) {
				echo $this->element('Pages/page_item', [
					'page' => $child
				]);
			} ?>
		</ul>
	<?php endif ?>
</li>
