<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;
use Tusk\Model\ApplicationTrait;

class FieldsController extends AppController
{
	use ApplicationTrait;
	
    public function index(string $tableName) {
        $columns = $this->Fields->getColumns($tableName);

        $this->set([
			"tableName" => $tableName, 
			"columns" => $columns,
			"rows" => $this->Fields->rows
		]);
    }

    public function add(string $tableName) {
		if ($this->request->is('post')) {
			$data = $this->request->getData();
		
			$entry = $this->Fields->newEntity($data);
			$this->Fields->create($tableName, $data);
			
			if ($this->Fields->save($entry)) {
				$this->Flash->success(__('The table has been saved.'));
				return $this->redirect(['action' => 'index', $data['tableName']]);
			}

			$this->Flash->error(__('The table could not be saved. Please, try again.'));
        }

		$columns = $this->prepareSelect(
			$this->Fields->listColumns($tableName)
		);

		$types = $this->Fields->getTypes();

		$this->set([
			"tableName" => $tableName,
			"types" => $types,
			"columns" => $columns
		]);
    }

    public function edit(string $tableName, string $field) {
		$entry = $this->Fields->getByName($field, $tableName);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			$entry = $this->Fields->patchEntity($entry, $data);


			if ($data['name'] != $data['currentName']) {
				$this->Fields->rename($tableName, $data["currentName"], $data["name"]);
			}

			$this->Fields->update($tableName, $field, $data);

			if ($this->Fields->save($entry)) {
				$this->Flash->success(__('The field has been saved.'));
				return $this->redirect(['action' => 'index', $tableName]);
			}

			$this->Flash->error(__('The field could not be saved. Please, try again.'));
        }

		$entry->Type = $this->Fields->translateType($entry->Type);

		$columns = $this->prepareSelect(
			$this->Fields->listColumns($tableName)
		);

		$types = $this->Fields->getTypes();

		$this->set([
			"tableName" => $tableName,
			"types" => $types,
			"columns" => $columns,
			"entry" => $entry,
			'data' => [
				"name" => $field,
				"currentName" => $field,
			]
		]);
    }

    public function delete(string $tableName, string $field) {
		$entry = $this->Fields->getByName($field, $tableName);
		$this->Fields->drop($tableName, $field);
		if ($entry) {
			$this->Fields->delete($entry);
		}
        return $this->redirect(['action' => 'index', $tableName]);
    }
}