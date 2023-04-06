<?php
declare(strict_types=1);

namespace Tusk\Model\Table;

use Cake\ORM\Table;

use Migrations\Migrations;
use Migrations\AbstractMigration;

class FieldsTable extends Table {

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

	public function create(string $tableName, array $data) : void {
		$table = $this->abstract->table($tableName);
		$table->addColumn($data['field'], $data['type'])->save();
	}

	public function drop(string $tableName, array $data) : void {
		$table = $this->abstract->table($tableName);
		$table->removeColumn($data['field'])->save();
	}

	public function rename(string $tableName, array $data) : void {
		$table = $this->abstract->table($tableName);
		$table->renameColumn($data['old'], $data['new'])->save();
	}
}
