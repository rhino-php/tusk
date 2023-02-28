<div class="inner-bound">
	<h1>Tables</h1>
	<ul>
		<?php foreach ($tables as $table) : ?>
			<li><?= $table ?></li>
			<li><?= $this->Html->link($table, ["controller" => $table]) ?></li>
		<?php endforeach ?>
	</ul>
</div>