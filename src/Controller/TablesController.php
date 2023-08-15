<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;
use Tusk\Handlers\FieldHandler;

/**
 * Tables Controller
 *
 * @method \Tusk\Model\Entity\Table[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TablesController extends AppController
{
	public function initialize(): void {
		parent::initialize();
		$this->FieldHandler = new FieldHandler();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $tables = $this->Tables->getList();
        $this->set(compact('tables'));
    }

    /**
     * View method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($tableName = null) {
        $this->Tables->setTable($tableName);
		$columns = $this->FieldHandler->listColumns($tableName);
		$data = $this->paginate($this->Tables);

        $this->set([
			'data' => $data,
			'columns' => $columns,
			'tableName' => $tableName
		]);
    }

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
	 */
	public function add($tableName = null) {
		$this->Tables->setTable($tableName);
		$defaults = $this->FieldHandler->getDefaults($tableName);
		$entry = $this->Tables->newEntity($defaults);
		$this->compose($tableName, $entry, ['title' => 'Add']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Table id.
	 * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function edit($tableName = null, $id = null) {
		$this->Tables->setTable($tableName);
		$entry = $this->Tables->get($id);
		$this->compose($tableName, $entry, ['title' => 'Edit']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Table id.
	 * @return \Cake\Http\Response|null|void Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($tableName = null, $id = null) {
		$this->Tables->setTable($tableName);
		$this->request->allowMethod(['post', 'delete']);
		$entry = $this->Tables->get($id);
		if ($this->Tables->delete($entry)) {
			$this->Flash->success(__('The table has been deleted.'), ['plugin' => 'Tusk']);
		} else {
			$this->Flash->error(__('The table could not be deleted. Please, try again.'), ['plugin' => 'Tusk']);
		}

		return $this->redirect(['action' => 'view', $tableName]);
	}

	public function createTable() {
		$this->Tables->createTable();
		echo "done";
	}

	public function compose($tableName, $entry, $params) {
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->FieldHandler->setFields($tableName, $this->request->getData());
			$table = $this->Tables->patchEntity($entry, $data);

			if ($this->Tables->save($table)) {
				$this->Flash->success(__('The entry has been saved.'), ['plugin' => 'Tusk']);

				return $this->redirect(['action' => 'view', $tableName]);
			}
			$this->Flash->error(__('The table could not be saved. Please, try again.'), ['plugin' => 'Tusk']);
		}
	
		$fields = $this->FieldHandler->getFields($tableName);
		$this->set(array_merge([
			'entry' => $entry,
			'fields' => $fields
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
}
