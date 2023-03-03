<!doctype html>
<html class="no-js" lang="<?= $local ?>"  data-theme="light">
<head>
	<?= $this->element('partials/head') ?>
</head>

<body>
	<a href="#main" class="skip-link button">common.skip-navigation</a>

	<main id="main" class="main-content">
		<div id="flash-messages" class="flash-messages">
			<?= $this->Flash->render() ?>
		</div>
	
		<div class="outer-bound stack--200">
			<?= $this->fetch('content') ?>
		</div>

		<hr class="footer-margin" />
	</main>

	<div id="overlay" class="overlay">
		<!-- $this->parsePHP(PATHTOWEBROOT . 'templates/shapes/components/light-box.php') ?> -->
	</div>
</body>
</html>
