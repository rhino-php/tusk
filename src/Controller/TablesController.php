<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;

/**
 * Tables Controller
 *
 * @method \Tusk\Model\Entity\Table[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TablesController extends AppController
{
	public function initialize(): void {
		parent::initialize();
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
		$entry = $this->Tables->newEmptyEntity();
		$this->set(['title' => 'Add']);
		$this->compose($entry, ["redirect" => ['action' => 'view', $tableName]]);
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
		$this->set(['title' => 'Edit']);
		$this->compose($entry, ["redirect" => ['action' => 'view', $tableName]]);
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


	public function preRender() {
		
	}
}
