<?php
declare(strict_types=1);

namespace Tusk\Handlers;

class FieldTypeHandler {
	public $customTypes = [
		"upload" => [
			"alias" => "Upload",
			"type" => "string"
		]
	];

	public $commonTypes = [
		"string" => "varchar(255)",
		"text",
		"integer" => "int(11) unsigned",
		"boolean" => "tinyint(1) unsigned",
		"float",
		"date",
		"datetime",
		"time",
		"timestamp",
	];

	public $types = [
		"binary",
		"bit",
		"biginteger",
		"blob",
		"char",
		"decimal",
		"double",
		"enum",
		"json",
		"set",
		"smallinteger",
		"uuid"
	];

	private $fieldValues = [
		"limit",
		"comment",
		"default",
		"null",
		"after",
		"signed",
		"precision",
		"scale",
		"values",
		"update",
		"timezone"
	];

	public function __construct() {
		
	}

	public function getTypes() {
		return [
			"Custom Types" => $this->prepareForSelect($this->customTypes),
			"Common Types" => $this->prepareForSelect($this->commonTypes),
			"All Types" => $this->prepareForSelect($this->types)
		];
	}

	public function getType(string $field) : string {
		$type = $this->customTypes[$field]["type"];
		return $type;
	}

	public function prepareFieldOptions($data) {
		$options = [];

		foreach ($this->fieldValues as $value) {
			// $foo !== "" insted of !empty($foo) to allow 0 as default
			if (isset($data[$value]) && $data[$value] !== "") {
				$options[$value] = $data[$value];
			}
		}

		if ($data["current_time"]) {
			$options["default"] = "CURRENT_TIMESTAMP";
		}

		if ($data["update"]) {
			$options["update"] = "CURRENT_TIMESTAMP";
		}

		return $options;
	}

	private function prepareForSelect($values) {
		$selectOptions = [];

		foreach ($values as $key => $value) {
			if (is_string($key)) {
				$value =  $key;
			}

			$selectOptions[$value] = $value;
		}

		return $selectOptions;
	}

	public function translateType(string $type): string {
		$types = array_merge($this->commonTypes, $this->types);

		foreach ($types as $key => $value) {
			if (is_string($key) && $type === $value) {
				return $key;
			}
		}

		return $type;
	}

	public function getDatabaseType($type) {
		if (isset($this->customTypes[$type])) {
			return $this->customTypes[$type]["type"];
		}
		return $type;
	}
}

?>