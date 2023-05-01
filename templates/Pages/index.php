<h1>Pages</h1>
<?= $this->Html->link('New Page', ['action' => 'change'], ['class' => 'button']) ?>

<ul class="page-list">
	<?= $this->element('Pages/page_item', [
		'pages' => $pages
	]) ?>
</ul>