<h1>Pages</h1>
<?= $this->Html->link('New Page', ['action' => 'change'], ['class' => 'button']) ?>

<ul>
	<?php foreach ($pages as $page) : ?>
		<li>
			<p><?= $page['name']; ?></p>
			<p><?= $this->Html->link('Edit', ['action' => 'edit', $page['id']], ['class' => 'button']) ?></p>
			<p><?= $this->Html->link('Settings', ['action' => 'change', $page['id']], ['class' => 'button']) ?></p>
		</li>
	<?php endforeach ?>
</ul>