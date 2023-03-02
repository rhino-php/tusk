<footer class="main-footer box">
	<div class="outer-bound inverted">
		<div class="stack">
			<?= $this->Html->link("Logout", ["controller" => "Users", "action" => "logout"]) ?>
			<?= $this->Html->link("Frontend", ["plugin" => null, "controller" => "Pages", "action" => "home"]) ?>
			<!-- $this->getWidgetChannel(1) ?> -->
		</div>

		<!-- $this->parsePHP(PATHTOWEBROOT . 'templates/shapes/components/nav.php', [
			'navId' => 'footer-nav',
			'parentId' => 4
		]); ?> -->
	</div>
</footer>