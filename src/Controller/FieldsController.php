<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;
use Tusk\Model\ApplicationTrait;
use Tusk\Handlers\FieldHandler;
use App\View\AjaxView;

class FieldsController extends AppController
{
	use ApplicationTrait;

	public function initialize(): void {
		parent::initialize();
		$this->FieldHandler = new FieldHandler();
	}
	
    public function index(string $tableName) {
        $columns = $this->Fields->getColumns($tableName);

        $this->set([
			"tableName" => $tableName, 
			"columns" => $columns,
			"rows" => $this->Fields->rows
		]);
    }

	public function add(string $tableName) {
		$entry = $this->Fields->newEmptyEntity();
		$this->compose($tableName, $entry, ['title' => 'Add']);
	}

	public function edit(string $tableName, string $field) {
		$entry = $this->Fields->getByName($field, $tableName);
		$this->compose($tableName, $entry, ['title' => 'Edit']);
	}

	public function delete(string $tableName, string $field) {
		$entry = $this->Fields->getByName($field, $tableName);
		$this->Fields->drop($tableName, $field);
		if ($entry) {
			$this->Fields->delete($entry);
		}
		return $this->redirect(['action' => 'index', $tableName]);
	}

	public function compose($tableName, $entry, $params) {
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			$data = $this->FieldHandler->setFiledData($data);
	
			$entry = $this->Fields->patchEntity($entry, $data);

			$data['type'] = $this->FieldHandler->getDatabaseType($data['type']);
		
			if ($this->request->getParam('action') == 'add') {
				$this->Fields->create($tableName, $data);
			} else {
				if ($data['name'] != $data['currentName']) {
					$this->Fields->rename($tableName, $data["currentName"], $data["name"]);
				}
				$this->Fields->update($tableName, $data["name"], $data);
			}

			if ($this->Fields->save($entry)) {
				$this->Flash->success(__('The field has been saved.'), ['plugin' => 'Tusk']);
				return $this->redirect(['action' => 'index', $tableName]);
			}

			$this->Flash->error(__('The field could not be saved. Please, try again.'), ['plugin' => 'Tusk']);
		}


		$settings = $this->getOptions($tableName, $entry['type'], $entry['name']);
		$types = $this->FieldHandler->getTypes();

		$this->set(array_merge([
			"tableName" => $tableName,
			"types" => $types,
			"entry" => $entry,
			'settings' => $settings
		], $params));

		try {
			return $this->render('compose');
		} catch (MissingTemplateException $exception) {
			if (Configure::read('debug')) {
				throw $exception;
			}
			throw new NotFoundException();
		}
	}

	public function getOptions($tableName, $type, $fieldName = null) {
		$settings = $this->FieldHandler->getSettings($type);

		if (isset($fieldName)) {
			$field = $this->Fields->getByName($fieldName, $tableName);
			$values = json_decode($field['settings'], true);
			foreach ($settings as $key => $setting) {
				if (isset($values[$key])) {
					$settings[$key]['value'] = $values[$key];
				}
			}
		}

		if (empty($settings)) {
			$template = 'databaseOptions';
			$columns = $this->prepareSelect(
				$this->FieldHandler->listColumns($tableName)
			);
			$this->set([
				"columns" => $columns,
			]);
		} else {
			$template = 'customOptions';
			$this->set([
				"settings" => $settings,
			]);
		}

		try {
			$this->viewBuilder()->disableAutoLayout();
			$content = $this->render($template);
			$this->viewBuilder()->enableAutoLayout();
			return $content;
		} catch (MissingTemplateException $exception) {
			if (Configure::read('debug')) {
				throw $exception;
			}
			throw new NotFoundException();
		}
	}
}