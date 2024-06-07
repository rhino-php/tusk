<!doctype html>
<html class="no-js" lang="<?= $local ?>">

<head>
	<?= $this->element('../layout/partials/head') ?>
</head>

<body class="is-loading">
	<header class="header box">
		<?= $this->element('../layout/partials/header') ?>
	</header>

	<main class="main-content inner-bound">
		<?= $this->Rhino->region('content'); ?>

		<div class="flash-messages">
			<?= $this->Flash->render() ?>
		</div>
	</main>

	<footer class="footer box">
		<?= $this->element('../layout/partials/footer') ?>
	</footer>

	<div class="loading-screen">
		<div class="loading-screen__animation"></div>
	</div>

	<?= $this->fetch('Rhino') ?>
</body>

</html>