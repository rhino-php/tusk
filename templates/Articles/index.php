<h1>Articles</h1>
<p><?= $this->Html->link("Add Article", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

<!-- Here's where we iterate through our $articles query object, printing out article info -->

<?php foreach ($articles as $article): ?>
    <tr>
		<td>
			<?= $article->id ?>
		</td>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?= $article->created->format('d.m.Y H:i:s') ?>
        </td>
        <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
			<?= $this->Form->postLink(
					'Delete',
					['action' => 'delete', $article->slug],
					['confirm' => 'Are you sure?']
				)
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>