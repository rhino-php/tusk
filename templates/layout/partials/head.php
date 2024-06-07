<?php
$cakeDescription = 'Tusk';
?>

<?= $this->Html->charset() ?>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
	<?= $cakeDescription ?>:
	<?= $this->fetch('title') ?>
</title>

<?= $this->Html->meta(
    'favicon.ico',
    '/favicon.ico',
    ['type' => 'icon']
); ?>

<?= $this->Html->css([
	'webfonts',
	'main'
]) ?>

<?= $this->Html->script([
	'main'
], ['type' => 'module']) ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<!--  Essential META Tags -->
<meta property="og:title" content="<?= $this->fetch('title') ?>">
<meta property="og:type" content="article" />
<meta property="og:image" content="https://dragonslayer.localhost<?= $this->fetch('meta-image', '/media/fantacy-Dragon.jpg') ?>">
<meta property="og:url" content="https://dragonslayer.coull.dev">
<meta name="twitter:card" content="summary_large_image">

<!--  Non-Essential, But Recommended -->
<meta property="og:site_name" content="<?= $this->fetch('title') ?>">
