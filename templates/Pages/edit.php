<h1><?= $page['name'] ?></h1>

<?= $this->Html->link('New Content', ['action' => 'addContent', $page['id']], ['class' => 'button']) ?>