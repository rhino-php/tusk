<?php $this->assign('title', 'login') ?>

<div class="box box--alt form stack">
	<div class="center login-logo">
		<?= $this->svg("Tusk.logo-big") ?>
	</div>
	
    <?= $this->Form->create(null, ['class' => 'stack']) ?>
		<?= $this->Form->control('email', ['required' => true]) ?>
		<?= $this->Form->control('password', ['required' => true]) ?>
		<?= $this->Form->control('remember_me', ['type' => 'checkbox']); ?>
		<?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>