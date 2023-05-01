<?php foreach ($navs as $nav): ?>
	<?php
		if (isset($nav['content'])) {
			echo $nav['content'];
			continue;
		}
	?>

	<div class="nav-block">
		<p class="nav-block__label"><?= $nav['heading'] ?></p>
		<ul class="nav-block__list">
			<?php foreach ($nav['buttons'] as $button): ?>
			<li class="nav-block__item">

				<?php if (isset($button['link'])): ?>
					<a <?= $this->getCurrent($button['link']) ?> class="button button--icon" href="<?= $this->Url->build($button['link']) ?>">
						<?= $this->svg($button['icon']) ?>
						<span><?= $button['name'] ?></span>
					</a>
				<?php endif ?>

				<?php if (isset($button['buttons'])): ?>
					<?php 
						$current = null;
						foreach ($button['buttons'] as $item) {
							$check = $this->getCurrent($item['link']);

							if ($check) {
								$current = 'aria-current="page"';
								break;
							}
						}	
					?>
					<details>
						<summary <?= $current ?> class="button button--icon">
							<?= $this->svg($button['icon'] ?: "icon/folder.svg") ?>
							<span><?= $button['name'] ?></span>
						</summary>
						
						<ul class="nav-block__list">
							<?php foreach ($button['buttons'] as $item): ?>
								<li class="nav-block__item">
									<a <?= $this->getCurrent($item['link']) ?> class="button button--icon" href="<?= $this->Url->build($item['link']) ?>">
										<?= $this->svg($item['icon'] ?: "icon/folder.svg") ?>
										<span><?= $item['name'] ?></span>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
					</details>
				<?php endif ?>

			</li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endforeach ?>