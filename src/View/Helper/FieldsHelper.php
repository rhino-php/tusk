<?php

namespace Tusk\View\Helper;

use Cake\View\Helper;
use Tusk\Handlers\FieldHandler;

class FieldsHelper extends Helper {

	public function initialize(array $config): void {
		$this->FieldHandler = new FieldHandler();
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
		
		$field->alias = $field->alias ?: $field->name;
		$params = $field->toArray();
		
		$params['value'] = $value;
		if (!empty($field->settings)) {
			$params['settings'] = json_decode($field->settings, true);
		}

		if (in_array($field['type'], $this->FieldHandler->types)) {
			return $this->_View->element('Fieldtypes' . DS . 'default', ['params' => $params]);
		}

		return $this->_View->element('Fieldtypes' . DS . $field['type'], ['params' => $params]);
	}
}