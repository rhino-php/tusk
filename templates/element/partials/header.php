<?php $rootId = 2 ?>

<header class="main-header box">
	<div class="outer-bound">

		<a id="home" href="/">
			<div class="logo">
				<!-- $this->parse(PATHTOWEBROOT . 'dist/img/logo.svg') ?> -->
				<span>Rhino</span>
			</div>
			<span class="sr-only">cmt_title</span>
		</a>

		<button id="menu-button" class="button nav--menu" aria-expanded="false">
			<div class="bars">
				<!-- $this->parse(PATHTOWEBROOT . 'dist/icons/bars.svg') ?> -->
			</div>

			<div class="cross">
				<!-- $this->parse(PATHTOWEBROOT . 'dist/icons/cross.svg') ?> -->
			</div>
		</button>

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
	</div>
</header>