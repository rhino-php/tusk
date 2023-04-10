<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;
use Tusk\Model\ApplicationTrait;

class FieldsController extends AppController
{
	use ApplicationTrait;
	
	private $rows = [
		"Field", 
		"Type", 
		"Null", 
		"Key", 
		"Default", 
		"Extra"
	];

    public function index(string $tableName) {
        $columns = $this->Fields->getColumns($tableName);

        $this->set([
			"tableName" => $tableName, 
			"columns" => $columns,
			"rows" => $this->rows
		]);
    }

    public function add(string $tableName) {
		$columns = $this->prepareSelect(
			$this->Fields->listColumns($tableName)
		);

		$types = [
			"Common Types" => $this->setValueAsKey($this->Fields->commonTypes),
			"All Types" => $this->setValueAsKey($this->Fields->types)
		];

		$this->set([
			"tableName" => $tableName,
			"types" => $types,
			"columns" => $columns
		]);

        if ($this->request->is('post')) {
			$data = $this->request->getData();
		
			$this->Fields->create($data['table'], $data);
			return $this->redirect(['action' => 'index', $data['table']]);
        }
    }

    public function rename(string $tableName, string $field) {
		$this->set([
			"tableName" => $tableName,
			'data' => [
				"newName" => $field,
				"oldName" => $field,
			]
		]);

		if ($this->request->is('post')) {
			$data = $this->request->getData();
			$this->Fields->rename($tableName, $data);
			return $this->redirect(['action' => 'index', $tableName]);
        }
    }

    public function delete(string $tableName, string $field)
    {
		$this->Fields->drop($tableName, $field);
        return $this->redirect(['action' => 'index', $tableName]);
    }
}