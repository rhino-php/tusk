<nav class="outer-bound">
	<div class="stack">
		<?php if ($this->Identity->isLoggedIn()): ?>
			<?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ["class" => 'button']) ?>
			<p>Logged in as: <?= $this->Identity->get('email'); ?></p>
		<?php else: ?>
			<?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ["class" => 'button']) ?>
		<?php endif ?>
	</div>

	<li>
		<details role="list" class="bottom dropdown">
			<summary aria-haspopup="listbox" role="button" class="contrast outline icon">
				<?= $this->Icon->svg('moon') ?>
				<span>Themes</span>
			</summary>
			<ul role="listbox">
				<li><a href="#" data-theme-switcher="auto">Theme: Auto</a></li>
				<li><a href="#" data-theme-switcher="light">Theme: Light</a></li>
				<li><a href="#" data-theme-switcher="dark">Theme: Dark</a></li>
			</ul>
		</details>
	</li>
</nav>