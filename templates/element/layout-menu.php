<div class="layout-menu">
	<h1>hello</h1>

	<div class="cluster">
		<?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'tusk-button']) ?>
		<button
				class="tusk-button open-modal"
				name="New Content"
				value="<?= $this->Url->build(['controller' => 'Contents', 'action' => 'new',  $page['id']]) ?>"
				data-dispatch="updateContent"
				>
				New
			</button>
	</div>
</div>