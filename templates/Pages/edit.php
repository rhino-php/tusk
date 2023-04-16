<h1><?= $page['name'] ?></h1>

<?= $this->Html->link('New Content', ['controller' => 'Contents', 'action' => 'change', $page['id']], ['class' => 'button']) ?>


<table>
	<?php foreach ($page['contents'] as $content) : ?>
		<tr>
			<td><?= $content['content'] ?></td>
			<td><?= $content['active'] ?></td>
			<td><?= $content['element_id'] ?></td>
			<td><?= $content['text'] ?></td>
			<td><?= $content['html'] ?></td>
		</tr>
	<?php endforeach ?>
</table>