<!doctype html>
<html class="no-js" lang="<?= $local ?>"  data-theme="light">
<head>
	<?= $this->element('partials/head') ?>
</head>

<body class="<?= h($this->classSave($this->fetch('title'))) ?>">
	<a href="#main" class="skip-link button">common.skip-navigation</a>

	<div class="frame">
		<!-- Main Sidebar -->
		<aside class="frame__sidebar">
			<a id="home" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']) ?>">
				<div class="logo">
					<?= $this->svg("icon/logo-big.svg") ?>
				</div>
				<span class="sr-only">Rhino</span>
			</a>

			<div>
				<p>Angemeldet als Carsten Coull</p>
				<?= $this->Html->link("Dashboard", ["plugin" => null, "controller" => "Pages", "action" => "home"], ["class" => "button"]) ?>
				<?= $this->element('partials/nav') ?>
			</div>


			<div class="stack">
				<?= $this->Html->link("Logout", ["controller" => "Users", "action" => "logout"], ["class" => "button"]) ?><br />
				<?= $this->Html->link("Frontend", ["plugin" => null, "controller" => "Pages", "action" => "home"], ["class" => "button"]) ?>
			</div>	
		</aside>
		
		<!-- Main Content -->
		
		<div class="frame__content">
			<?= $this->element('partials/header') ?>

			<main id="main" class="main-content">
				<div id="flash-messages" class="flash-messages">
					<?= $this->Flash->render() ?>
				</div>
			
				<div class="outer-bound stack--200">
					<?= $this->fetch('content') ?>
				</div>
	
				<hr class="footer-margin" />
			</main>

			<?= $this->element('partials/footer') ?>
		</div>
		
	</div>

	<div id="overlay" class="overlay">
		<!-- $this->parsePHP(PATHTOWEBROOT . 'templates/shapes/components/light-box.php') ?> -->
	</div>
</body>
</html>
