<div class="frame">
		<!-- Main Sidebar -->
		<nav class="frame__sidebar">
			<a id="home" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']) ?>">
				<div class="logo">
					<?= $this->svg("icon/logo-big.svg") ?>
				</div>
				<span class="sr-only">Rhino</span>
			</a>

			<div class="nav-block">
				<p class="nav-block__label">Angemeldet als Carsten Coull</p>
				<ul class="nav-block__list">
					<li class="nav-block__item">
						<a aria-current="page" class="button button--icon" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']) ?>">
							<?= $this->svg("icon/home.svg") ?>
							<span>Dashboard</span>
						</a>
					</li>
				</ul>
			</div>

			<div class="nav-block">
				<p class="nav-block__label">Standartfunktionen</p>
				<ul class="nav-block__list">
					<li class="nav-block__item">
						<a class="button button--icon" href="/">
							<?= $this->svg("icon/file.svg") ?>
							<span>Seiten</span>
						</a>
					</li>
					<li class="nav-block__item">
						<a class="button button--icon" href="/">
							<?= $this->svg("icon/image.svg") ?>
							<span>Medien</span>
						</a>
					</li>
					<li class="nav-block__item">
						<a class="button button--icon" href="/">
							<?= $this->svg("icon/sidebar.svg") ?>
							<span>Widgets</span>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="nav-block">
				<p class="nav-block__label">Benutzerfunktionen</p>
				<ul class="nav-block__list">
					<li class="nav-block__item">
						<details>
							<summary class="button button--icon">
								<?= $this->svg("icon/folder.svg") ?>
								<span>Funktionen 1</span>
							</summary>
							
							<ul class="nav-block__list">
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>option 1</span>
									</a>
								</li>
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>option 2</span>
									</a>
								</li>
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>option 3</span>
									</a>
								</li>
							</ul>
						</details>
					</li>
					<li class="nav-block__item">
						<details>
							<summary class="button button--icon">
								<?= $this->svg("icon/folder.svg") ?>
								<span>Funktionen 2</span>
							</summary>
							
							<ul class="nav-block__list">
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>option 1</span>
									</a>
								</li>
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>option 2</span>
									</a>
								</li>
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>option 3</span>
									</a>
								</li>
							</ul>
						</details>
					</li>
				</ul>
			</div>

			<div class="nav-block">
				<p class="nav-block__label">Einstellungen</p>
				<ul class="nav-block__list">
					<li class="nav-block__item">
						<details>
							<summary class="button button--icon">
								<?= $this->svg("icon/table.svg") ?>
								<span>Templates</span>
							</summary>
							
							<ul class="nav-block__list">
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>option 1</span>
									</a>
								</li>
							</ul>
						</details>
					</li>
					<li class="nav-block__item">
						<details>
							<summary class="button button--icon">
								<?= $this->svg("icon/users.svg") ?>
								<span>Benutzerverwaltung</span>
							</summary>
							
							<ul class="nav-block__list">
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>option 1</span>
									</a>
								</li>
							</ul>
						</details>
					</li>
					<li class="nav-block__item">
						<details>
							<summary class="button button--icon">
								<?= $this->svg("icon/settings.svg") ?>
								<span>Admin</span>
							</summary>
							
							<ul class="nav-block__list">
								<li class="nav-block__item">
									<a class="button button--icon" href="/">
										<?= $this->svg("icon/book.svg") ?>
										<span>Applikation-Manager</span>
									</a>
								</li>
							</ul>
						</details>
					</li>
					<li class="nav-block__item">
						<details>
							<summary class="button button--icon">
								<?= $this->svg("icon/user.svg") ?>
								<span>Profil</span>
							</summary>
							
							<ul class="nav-block__list">
								<li class="nav-block__item">
									<a class="button button--icon" href="<?= $this->Url->build(["controller" => "Users", "action" => "logout"]) ?>">
										<?= $this->svg("icon/log-out.svg") ?>
										<span>log-out</span>
									</a>
								</li>
							</ul>
						</details>
					</li>
				</ul>
			</div>

			<!-- <div class="stack">
				<?= $this->Html->link("Frontend", ["plugin" => null, "controller" => "Pages", "action" => "home"], ["class" => "button"]) ?>
			</div>	 -->
		</nav>
		
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