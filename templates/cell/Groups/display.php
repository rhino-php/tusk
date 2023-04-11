<?php if (!$groups->isEmpty()) : ?>
<div class="nav-block">
	<p class="nav-block__label">Benutzerfunktionen</p>
	<ul class="nav-block__list">
		<?php foreach ($groups as $group) : ?>
		<li class="nav-block__item">
			<details>
				<summary class="button button--icon">
					<?= $this->svg("icon/folder.svg") ?>
					<span><?= $group["name"] ?></span>
				</summary>
				
				<ul class="nav-block__list">
					<?php foreach ($group['applications'] as $app) : ?>
					<li class="nav-block__item">
						<a class="button button--icon" href="<?= $this->Url->build(['controller' => 'Tables', "action" => "view", $app['name']]) ?>">
							<?= $this->svg("icon/book.svg") ?>
							<span><?= $app["name"] ?></span>
						</a>
					</li>
					<?php endforeach ?>
				</ul>
			</details>
		</li>
		<?php endforeach ?>
	</ul>
</div>
<?php endif ?>