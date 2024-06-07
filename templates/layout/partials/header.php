<div class="header__wrapper outer-bound">
	<a href="<?= $this->Url->build('/') ?>" class="logo cluster">
		<?= $this->Icon->svg('logo') ?>
		<span>Tusk</span>
	</a>

	<div id="menu">
		<nav>
		<?php
			echo $this->Menu->get(1, [
				'limit' => 0,
				'ul' => ['class' => 'nav-list cluster list-style-none'],
				'li' => ['class' => 'nav-list__item'],
				'link' => ['class' => 'button alt-button'],
				'summary' => ['class' => 'button alt-button'],
				'details' => ['role' => 'list'],
			]);
			?>
		</nav>

		<button id="menu-toggle" class="menu__button button">
			<?= $this->Icon->svg('menu') ?>
			<?= $this->Icon->svg('x') ?>
			<span class="sr-only">toggle Menu</span>
		</button>
	</div>
</div>