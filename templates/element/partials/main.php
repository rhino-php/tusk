<div id="flash-messages" class="flash-messages">
	<?= $this->Flash->render() ?>
</div>

<main id="main" class="main-content">
	<div class="outer-bound stack--200">
		<?= $this->fetch('content') ?>
	</div>

	<!-- Dummy Element for appling margin to -->
	<hr class="footer-margin" />
</main>

<div id="overlay" class="overlay">
	<!-- $this->parsePHP(PATHTOWEBROOT . 'templates/shapes/components/light-box.php') ?> -->
</div>