<?php
declare(strict_types=1);

namespace Tusk\Model\Table;

use Cake\ORM\Table;

use Migrations\Migrations;
use Migrations\AbstractMigration;

class FieldsTable extends Table {

	public $commonTypes = [
		"string", 
		"text",
		"boolean",
		"float",
		"integer",
		"date",
		"time",
		"timestamp",
	];

	public $types = [
		"binary",
		"bit",
		"biginteger",
		"boolean",
		"blob",
		"char",
		"date",
		"datetime",
		"decimal",
		"double",
		"enum",
		"float",
		"integer",
		"json",
		"set",
		"smallinteger",
		"string", 
		"text",
		"time",
		"timestamp",
		"uuid"
	];

    public function initialize(array $config): void {
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
		$columns = $this->abstract->query($query)->fetchAll();

		return $columns;
	}

	public function listColumns(string $tableName) : array {
		$_columns = $this->getColumns($tableName);
		$columns = [];

		foreach ($_columns as $column) {
			$columns[] = $column["Field"];
		}

		return $columns;
	}

	public function create(string $tableName, array $data) : void {
		$options = [];
		$values = [
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

		foreach ($values as $value) {
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

		$table = $this->abstract->table($tableName);
		$table->addColumn($data['name'], $data['type'], $options);
		$table->save();
	}

	public function drop(string $tableName, string $field) : void {
		$table = $this->abstract->table($tableName);
		$table->removeColumn($field)->save();
	}

	public function rename(string $tableName, array $data) : void {
		$table = $this->abstract->table($tableName);
		$table->renameColumn($data['oldName'], $data['newName'])->save();
	}
}
