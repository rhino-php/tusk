<h1>Pages</h1>
<?= $this->Html->link('New Page', ['action' => 'change'], ['class' => 'button']) ?>

<ul>
	<?= $this->element('Pages/page_item', [
		'page' => $pages['0']
	]) ?>
</ul>