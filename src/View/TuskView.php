<?php
declare(strict_types=1);

namespace Tusk\View;

use Tusk\Model\Table\PagesTable;

trait TuskView
{
	public function classSave($string): string {
		$_string = urlencode(str_replace(" ", "-", strtolower($string)));
		return $_string;
	}

	public function svg($string): string {
		$path = $this->pathToWebroot() . $string;
		return file_get_contents($path);
	}

	public function pathToWebroot(): string {
		return \Cake\Core\App::path('plugins')[0] . "Tusk" . DS . "webroot" . DS;
	}

	public function backLink() : string {
		return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "#";
	}

	public function getCurrent(mixed $args) : ?string {
		if (is_string($args)) {
			if ($args != $this->request->getEnv("REQUEST_URI")) {
				return null;
			}
		}

		if (is_array($args)) {
			foreach ($args as $key => $arg) {
				if (empty($key)) {
					$key = 'pass';
				}
				
				$value = $this->request->getParam((string)$key);

				if (is_array($value)) {
					$value = $value[0];
				}

				if ($arg != $value) {
					return null;
				}
			}
		}

		return 'aria-current="page"';
	}

	public function parseEditor(string $json) : string {
		$object = json_decode($json);

		$content = '';
		foreach ($object->blocks as $key => $block) {
			$data = $block->data;

			switch ($block->type) {
				case 'header':
					$level = 'h' . $data->level;
					$content .= '<' . $level . '>' . $data->text . '</' . $level . '>';
					break;
				
				default:
					$content .= '<p>' . $data->text . '</p>';
					break;
			}
		}

		return $content;
	}

	public function getPages(int $baseId = 0) : array {
		$this->Pages = new PagesTable();
		$_pages = $this->Pages->find('all')->toArray();
		return $this->Pages->getChildren($baseId, $_pages);
	}

	public function pageLink(int $id, array $options = []) : string {
		$this->Pages = new PagesTable();
		$page = $this->Pages->get($id);
		return $this->Html->link($page["name"], ['plugin' => null, 'controller' => 'Pages', 'action' => 'display', urlencode($page["name"])], $options);
	}
}
