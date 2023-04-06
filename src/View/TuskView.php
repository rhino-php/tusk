<?php
declare(strict_types=1);

namespace Tusk\View;

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
}
