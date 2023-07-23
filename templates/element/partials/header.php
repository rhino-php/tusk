<header class="main-header">
	<div class="outer-bound cluster">
		<h1><?= h($this->fetch('title')) ?></h1>
	</div>
	<button id="menu-button" class="icon-button">
		<span class="sr-only">Toggle menu</span>
		<span class="icon menu"><?= $this->svg('Tusk.menu') ?></span>
		<span class="icon cross"><?= $this->svg('Tusk.x') ?></span>
	</button>
</header>