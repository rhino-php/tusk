
<?php foreach ($page["contents"] as $content) : ?>
	<?php if (!$content['active']) 	continue; ?>
		<div>
			<div class="box">
				<?= $this->Html->link('Edit', ['controller' => 'Contents', 'action' => 'change', $page['id'], $content['id']]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contents', 'action' => 'delete', $content['id']], ['confirm' => __('Are you sure you want to delete # {0}?', $content['id'])]) ?>
			</div>
			<?= $this->element($content['element']['element'], $content->toArray()) ?>
		</div>
<?php endforeach ?>

<?= $this->Html->link('New Content', ['controller' => 'Contents', 'action' => 'change', $page['id']], ['class' => 'button']) ?>
<?= $this->Html->link('Back', ['action' => 'index'], ['class' => 'button']) ?>
