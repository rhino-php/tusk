<?php 
$this->assign('title', $page["name"]); 
?>

<?php foreach ($page["contents"] as $content) : ?>
	<?php 
		if (!$content['active']) {
			continue;
		}

		echo $this->element($content['element']['element'], $content->toArray()) ?>
<?php endforeach ?>