<?php
declare(strict_types=1);

namespace Tusk\Model\Table;

use Cake\ORM\Table;

use Migrations\Migrations;
use Migrations\AbstractMigration;

class FieldsTable extends Table {

	public $rows = [
		"Field",
		"Type",
		"Null",
		"Key",
		"Default",
		"Extra"
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

    public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('tusk_fields');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		// Create Abstact to start Database Operations
		$migrations = new Migrations;
		$migrations->setInput($migrations->getInput('Seed', [], []));
		$manager = $migrations->getManager($migrations->getConfig());
		$env = $manager->getEnvironment('default');

		// Use Abstract to alter database
		// https://book.cakephp.org/phinx/0/en/migrations.html
		$this->abstract = new AbstractMigration('default', 1);
		$this->abstract->setAdapter($env->getAdapter());
    }
	
	public function getColumns(string $tableName) {
		// Protection against posible SQL Injection
		if (!$this->abstract->hasTable($tableName)) {
			return;
		}

		$query = "describe " . $tableName;
		$_columns = $this->abstract->query($query)->fetchAll();
		$columns = [];

		foreach ($_columns as $fields) {
			$column = [];
			foreach ($this->rows as $row) {
				$column[$row] = $fields[$row];
			}
			$columns[] = $column;
		};

		return $columns;
	}

	public function getColumn(string $tableName, string $fieldName) {
		$columns = $this->getColumns($tableName);

		foreach ($columns as $column) {
			if ($column["Field"] == $fieldName) {
				return $column;
			}
		}

		return false;
	}

	public function listColumns(string $tableName) : array {
		return array_column($this->getColumns($tableName), "Field");
	}

	public function getFields(string $tableName) {
		$handledFields = [];
		$columns = [];
		$fields = $this->find()
			->where(['tableName' => $tableName])
			->all();

		foreach ($fields as $key => $field) {
			$column = $this->getColumn($tableName, $field->name);
			$column['Type'] = $this->translateType($column['Type']);
			$field->set($column);
			$handledFields[] = $field->name;
		}

		$_columns = $this->listColumns($tableName);
		$columns = array_diff($_columns, $handledFields);

		$result = [
			'fields' => $fields,
			'columns' => $columns
		];

		return $result;
	}

	public function create(string $tableName, array $data) : void {
		$table = $this->abstract->table($tableName);
		$table->addColumn($data['name'], $data['type'], $this->prepareFieldOptions($data));
		$table->save();
	}

	public function drop(string $tableName, string $field) : void {
		$table = $this->abstract->table($tableName);
		$table->removeColumn($field)->save();
	}

	public function rename(string $tableName, string $currentName, string $name) : void {
		$table = $this->abstract->table($tableName);
		$table->renameColumn($currentName, $name)->save();
	}

	public function getByName($fieldName, $tableName) {
		$query = $this->find()->where(['name' => $fieldName, 'tableName' => $tableName]);
		$column = $this->getColumn($tableName, $fieldName);

		if ($query->isEmpty()) {
			$entry = $this->newEmptyEntity();
			$entry->name = $fieldName;
			$entry->tableName = $tableName;
		} else {
			$entry = $query->first();
		}

		$entry->set($column);

		return $entry;
	}

	public function translateType(string $type) : string {
		$types = array_merge($this->commonTypes, $this->types);
		
		foreach ($types as $key => $value) {
			if ( is_string($key) && $type === $value) {
				return $key;
			}
		}
		
		return $type;
	}

	public function getTypes() {
		return [
			"Common Types" => $this->prepareForSelect($this->commonTypes),
			"All Types" => $this->prepareForSelect($this->types)
		];
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

	private function prepareFieldOptions($data) {
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

	public function update($tableName, $fieldName, $data) {
		$table = $this->abstract->table($tableName);
		$table->changeColumn($fieldName, $data['type'], $this->prepareFieldOptions($data));
		$table->update();
	}
}
