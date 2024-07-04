<!doctype html>
<html class="no-js" lang="<?= $local ?>">

<head>
	<?= $this->element('partials/head') ?>
</head>

<body class="is-loading">
	<a href="#main" class="skip-link button">common.skip-navigation</a>

	<header class="header box">
		<?= $this->element('partials/header') ?>
	</header>

	<main id="main" class="main-content inner-bound">
		<?= $this->element('partials/main') ?>
	</main>

	<footer class="footer box">
		<?= $this->element('partials/footer') ?>
	</footer>

	<div class="loading-screen">
		<div class="loading-screen__animation"></div>
	</div>

	<?= $this->fetch('Rhino') ?>
</body>

</html>