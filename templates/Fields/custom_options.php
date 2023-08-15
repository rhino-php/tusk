<?php foreach ($settings as $key => $params) : ?>
	<div>
		<?= $this->Form->control($key, ['type' => $params['type'], 'value' => isset($params['value']) ? $params['value'] : $params['default']]); ?>
		<p><?= $params['description'] ?></p>
	</div>
<?php endforeach ?>