<div class="input <?= isset($params['class']) ? $params['class'] : "" ?>">
	<?= $this->Form->control($params['name'], ['label' => $params['alias'], 'value' => $params['value'], ...$options]) ?>
	<?php if (isset($params['description'])) : ?>
		<p><?= $params['description'] ?></p>
	<?php endif ?>
</div>