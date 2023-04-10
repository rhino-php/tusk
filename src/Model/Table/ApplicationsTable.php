<?php
declare(strict_types=1);

namespace Tusk\Model\Table;

use Cake\ORM\Table;

use Migrations\Migrations;
use Migrations\AbstractMigration;

class ApplicationsTable extends Table
{
	private $tableBlackList = [
		"phinxlog",
		"users"
	];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
		parent::initialize($config);

        $this->setTable('applications');
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

	public function getList() {
		$_tables = $this->abstract->query("show tables")->fetchAll();

		$tables = [];
		foreach ($_tables as $table) {
			$tableName = $table[0];
			if (in_array($tableName, $this->tableBlackList)) {
				continue;
			}
			$tables[] = $tableName;
		}

		return $tables;
	}

	public function hasTable(string $tableName) : bool {
		return $this->abstract->hasTable($tableName);
	}

	public function create(string $tableName) : void {
		$table = $this->abstract->table($tableName);
		$table->create();
	}
	
	public function rename(string $tableName, string $newName) : void {
		$table = $this->abstract->table($tableName);
		$table->rename($newName)->update();
	}

	public function drop(string $tableName) : void {
		$table = $this->abstract->table($tableName);
		$table->drop()->save();
	}
}
