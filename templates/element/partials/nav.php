<a id="home" href="<?= $this->Url->build(['controller' => 'Overview', 'action' => 'display', 'home']) ?>">
	<div class="logo">
		<?= $this->svg("icon/logo-big.svg") ?>
	</div>
	<span class="sr-only">Rhino</span>
</a>

<div class="nav-block">
	<p class="nav-block__label">Angemeldet als Carsten Coull</p>
	<ul class="nav-block__list">
		<li class="nav-block__item">
			<a aria-current="page" class="button button--icon" href="<?= $this->Url->build(['controller' => 'Overview', 'action' => 'display', 'home']) ?>">
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
			<a class="button button--icon" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index']) ?>">
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

<?= $this->cell('Tusk.Groups'); ?>

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
						<a class="button button--icon" href="<?= $this->Url->build(['controller' => 'Tables', 'action' => 'view', 'tusk_elements']) ?>">
							<?= $this->svg("icon/book.svg") ?>
							<span>Elemente</span>
						</a>
					</li>
					<li class="nav-block__item">
						<a class="button button--icon" href="<?= $this->Url->build(['controller' => 'Tables', 'action' => 'view', 'tusk_layouts']) ?>">
							<?= $this->svg("icon/book.svg") ?>
							<span>Layouts</span>
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
						<a class="button button--icon" href="<?= $this->Url->build(['controller' => 'Users']) ?>">
							<?= $this->svg("icon/users.svg") ?>
							<span>Nutzerverwaltung</span>
						</a>
					</li>
					<li class="nav-block__item">
						<a class="button button--icon" href="/">
							<?= $this->svg("icon/lock.svg") ?>
							<span>Rechteverwaltung</span>
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
						<a class="button button--icon" href="<?= $this->Url->build(['controller' => 'Applications', "action" => "index"]) ?>">
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
						<a class="button button--icon" href="<?= $this->Url->build(["controller" => "Users", "action" => "edit", $user->id]) ?>">
							<?= $this->svg("icon/edit.svg") ?>
							<span>Profil bearbeiten</span>
						</a>
					</li>
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