<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class TuskInit extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void {

		echo '<pre>';
		var_dump($_ENV);
		die;

		$userTable = 'tusk_users';
		$layoutsTable = 'tusk_layouts';
		$elementsTable = 'tusk_elements';
		$contentsTable = 'tusk_contents';
		$pagesTable = 'tusk_pages';

		$this->table($userTable)
			->addColumn('name', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('email', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('password', 'string', [
				'default' => null,
				'null' => false,
			])
			->addColumn('active', 'boolean', [
				'default' => 1,
			])
			->addColumn('created', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP'
			])
			->addColumn('modified', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP',
				'update' => 'CURRENT_TIMESTAMP'
			])
			->create();

		$this->table('tusk_fields')
			->addColumn('name', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('alias', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => true,
			])
			->addColumn('tableName', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('type', 'string', [
				'default' => 'string',
			])
			->addColumn('description', 'text', [
				'default' => null,
				'null' => true,
			])
			->create();

		$this->table('tusk_apps')
			->addColumn('name', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('alias', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('active', 'boolean', [
				'default' => 1,
			])
			->addColumn('tusk_group_id', 'integer', [
				'null' => true
			])
			->addColumn('created', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP'
			])
			->addColumn('modified', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP',
				'update' => 'CURRENT_TIMESTAMP'
			])
			->create();

		$this->table('tusk_groups')
			->addColumn('name', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('active', 'boolean', [
				'default' => 1,
			])
			->addColumn('created', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP'
			])
			->addColumn('modified', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP',
				'update' => 'CURRENT_TIMESTAMP'
			])
			->create();

		$this->table('tusk_pages')
			->addColumn('name', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('active', 'boolean', [
				'default' => 1,
			])
			->addColumn('is_homepage', 'boolean', [
				'default' => 0,
			])
			->addColumn('type', 'integer', [
				'default' => 0,
			])
			->addColumn('parent', 'integer', [
				'default' => 0,
			])
			->addColumn('layout_id', 'integer', [
				'default' => 0,
			])
			->addColumn('created', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP'
			])
			->addColumn('modified', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP',
				'update' => 'CURRENT_TIMESTAMP'
			])
			->create();

		$this->table($layoutsTable)
			->addColumn('name', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('layout', 'string', [
				'default' => null,
			])
			->addColumn('active', 'boolean', [
				'default' => 1,
			])
			->addColumn('created', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP'
			])
			->addColumn('modified', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP',
				'update' => 'CURRENT_TIMESTAMP'
			])
			->create();
		
		$this->table($elementsTable)
			->addColumn('name', 'string', [
				'default' => null,
				'limit' => 100,
				'null' => false,
			])
			->addColumn('element', 'string', [
				'default' => null,
			])
			->addColumn('active', 'boolean', [
				'default' => 1,
			])
			->addColumn('created', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP'
			])
			->addColumn('modified', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP',
				'update' => 'CURRENT_TIMESTAMP'
			])
			->create();
		
		$this->table($contentsTable)
			->addColumn('page_id', 'integer', [
				'default' => Null,
			])
			->addColumn('element_id', 'integer', [
				'default' => Null,
			])
			->addColumn('html', 'text', [
				'default' => null,
				'null' => true,
			])
			->addColumn('active', 'boolean', [
				'default' => 1,
			])
			->addColumn('position', 'integer', [
				'default' => 0,
			])
			->addColumn('created', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP'
			])
			->addColumn('modified', 'timestamp', [
				'default' => 'CURRENT_TIMESTAMP',
				'update' => 'CURRENT_TIMESTAMP'
			])
			->create();

		if ($this->isMigratingUp()) {
			$this->table($userTable)
				->insert([
					[
						'name' => 'Rhino',
						'email' => 'rhino@example.com',
						'password' => '$2y$10$K3QWvKMgUII15BYrojErpuY8nfCFBZbH2/cp9byzq6iG8olEHCeb.'
					]
				])
				->saveData();

			$this->table($layoutsTable)
				->insert([
					[
						'name' => 'Default',
						'layout' => 'default',
					]
				])
				->saveData();
				
			$this->table($elementsTable)
				->insert([
					[
						'name' => 'Text',
						'element' => 'text',
					]
				])
				->saveData();
						
			$this->table($pagesTable)
				->insert([
					[
						'name' => 'Home',
						'is_homepage' => 1,
						'layout_id' => 1,
					]
				])
				->saveData();
					
			$this->table($contentsTable)
				->insert([
					[
						'page_id' => 1,
						'element_id' => 1,
						'html' => '{"time":1687790356480,"blocks":[{"id":"BkMrFh55lD","type":"header","data":{"text":"Welcome to Rhino 🦏","level":2}},{"id":"R_LcFT6kwI","type":"paragraph","data":{"text":"The fast but stable Application-Framwork.<br>Powered by <a href=\"https://cakephp.org/\">CakePHP</a>."}}],"version":"2.26.5"}'
					]
				])
				->saveData();
		}
    }
}
