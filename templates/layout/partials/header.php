<div class="header__wrapper outer-bound">
	<a href="<?= $this->Url->build('/') ?>" class="logo cluster">
		<?= $this->Icon->svg('logo') ?>
		<span>Tusk</span>
	</a>

	<div class="menu">
		<nav id="main-menu">
			<?php
			echo $this->Menu->get(1, [
				'limit' => 0,
				'ul' => ['class' => 'nav__links nav-list cluster list-style-none'],
				'li' => ['class' => 'nav-list__item'],
				'link' => ['class' => 'button alt-button'],
				'summary' => ['class' => 'button alt-button'],
				'details' => ['role' => 'list'],
			]);
			?>
		</nav>
	</div>

	<button id="menu-button" class="menu__button button" aria-expanded="false">
		<span class="menu--open"><?= $this->Icon->svg('menu'); ?></span>
		<span class="sr-only">toggle Menu</span>
	</button>
</div>
</div>