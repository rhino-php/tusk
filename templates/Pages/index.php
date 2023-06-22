<div class="stack">
	<h1>Pages</h1>
	
	<ul class="page-list">
		<?= $this->element('Pages/page_item', [
			'pages' => $pages
			]) ?>
	</ul>
	
	<?= $this->Html->link('New Page', ['action' => 'change'], ['class' => 'button']) ?>
</div>