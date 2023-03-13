<div class="frame">
	<!-- Main Sidebar -->
	<nav class="frame__sidebar">
		<?= $this->element('partials/nav') ?>
	</nav>
	
	<!-- Main Content -->
	
	<div class="frame__content">
		<?= $this->element('partials/header') ?>

		<div id="flash-messages" class="flash-messages">
			<?= $this->Flash->render() ?>
		</div>
		
		<main id="main" class="main-content">
		
			<div class="outer-bound stack--200">
				<?= $this->fetch('content') ?>
			</div>

			<hr class="footer-margin" />
		</main>

		<?= $this->element('partials/footer') ?>
	</div>
	
</div>