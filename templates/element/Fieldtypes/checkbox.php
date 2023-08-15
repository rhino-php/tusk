<div class="input <?= isset($params['class']) ? $params['class'] : "" ?>">
	<div class="checkbox">
		<label for="<?= $params['name'] ?>"><?= $params['alias'] ?></label>
		<input id="<?= $params['name'] ?>" name="<?= $params['name'] ?>" value="checked" type="checkbox" <?php if ($params['value']) echo 'checked="true"' ?>>
	</div>
	<?php if (isset($params['description'])) : ?>
		<p><?= $params['description'] ?></p>
	<?php endif ?>
</div>