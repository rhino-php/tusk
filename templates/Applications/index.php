<div>

	<ul>
		<?php foreach ($applications as $table) : ?>
			<li><?= $this->Html->link($table, ["action" => 'edit', $table]) ?></li>
		<?php endforeach ?>
	</ul>
	<?= $this->Html->link("Create new Table", ["action" => "add"], ["class" => "button"]) ?>
</div>