<?php

namespace Tusk\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

use Cake\View\StringTemplateTrait;

class FieldsHelper extends Helper {
	use StringTemplateTrait;

	protected $_defaultConfig = [
		'errorClass' => 'error',
		'templates' => [
			'wrapper' => '<div class="{{class}}"><label for="{{name}}">{{alias}}</label>{{content}}</div>',
			'input' => '<input type="{{type}}" name="{{name}}" id="{{name}}" value="{{value}}">',
			'text' => '<textarea name="{{name}}" id="{{name}}">{{value}}</textarea>',
			'checkbox' => '<input type="checkbox" {{checked}} name="{{name}}" id="{{name}}" value="{{value}}">',
		],
	];


	public function initialize(array $config): void {
	}

	public function render($fields, $values) {
		$content = '';

		foreach ($fields as $field) {
			$name = $field['name'];
			$content .= $this->getField($field, $values[$name]);
		}

		return $content;
	}

	private function getField($field, $value) {
		$params = $field->toArray();
		$params['value'] = $value;
		$params['class'] = 'input';
		$params['type'] = 'text';

		$template = 'input';

		switch ($field['Type']) {

			case 'boolean':
				$params['checked'] = $value ? 'checked' : '';
				$template = 'checkbox';
				break;

			case 'integer':
				$params['type'] = 'number';
				break;

			case 'text':
				$template = 'text';
				break;
		}

		$params['content'] = $this->formatTemplate($template, $params);
		return $this->formatTemplate('wrapper', $params);
	}
}