	<h1>Edit User</h1>
	<?= $this->Form->create($entry, ["class" => "stack"]); ?>

	<?php
	echo $this->Form->allControls();
	?>

	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>

	</div>