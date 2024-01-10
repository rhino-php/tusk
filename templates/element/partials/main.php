<div id="flash-messages" class="flash-messages">
	<?= $this->Flash->render() ?>
</div>

<main id="main" class="main-content">

	<?= $this->Rhino->region('content'); ?>
	
	<!-- Dummy Element for appling margin to -->
	<hr class="footer-margin" />
</main>
<aside>
	<?= $this->Rhino->region('aside'); ?>
</aside>

<div id="overlay" class="overlay">
	<!-- $this->parsePHP(PATHTOWEBROOT . 'templates/shapes/components/light-box.php') ?> -->
</div>