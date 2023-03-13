<?php
declare(strict_types=1);

namespace Tusk\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;
use Migrations\Table as MigTable;
use Migrations\Migrations;
use Migrations\AbstractMigration;

class ApplicationsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
		// parent::initialize($config);
		$this->Collection = ConnectionManager::get('default')->getSchemaCollection();

		// Create Abstact to start Database Operations
		$migrations = new Migrations;
		$input = $migrations->getInput('Seed', [], []);
		$migrations->setInput($input);
		$config = $migrations->getConfig();
		$manager = $migrations->getManager($config);
		$env = $manager->getEnvironment('default');
		$this->abstract = new AbstractMigration('default', 1);
		$this->abstract->setAdapter($env->getAdapter());
    }

	public function getList() {
		return $this->Collection->listTables();
	}

	public function create(string $tableName) {
		$this->abstract->table($tableName)->create();
	}
}
