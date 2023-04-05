<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;
use Cake\Database\Schema\TableSchema;

/**
 * Tables Controller
 *
 * @method \Tusk\Model\Entity\Table[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $applications = $this->Applications->getList();
        $this->set(compact('applications'));
    }

    /**
     * View method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($tableName = null)
    {
		$columns = $this->Applications->getColumns($tableName);
		$rows = ["Field", "Type", "Null", "Key", "Default", "Extra"];

        $this->set([
			"tableName" => $tableName, 
			"columns" => $columns,
			"rows" => $rows
		]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
			$data = $this->request->getData();
			$applications = $this->Applications->getList();

			if (in_array($data['name'], $applications)) {
				$this->Flash->success(__('The table ' . $data['name'] . ' already exists.'));
				return;	
			}

			$this->Applications->create($data["name"]);
			return $this->redirect(['action' => 'edit', $data["name"]]);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($tableName = null)
    {
		$data = [
			"newName" => $tableName,
			"oldName" => $tableName,
		];

		$this->set([
			'data' => $data,
		]);

		if ($this->request->is('post')) {
			$data = $this->request->getData();

			$this->Applications->rename($data["oldName"], $data["newName"]);
			return $this->redirect(['action' => 'edit', $data["newName"]]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(string $tableName)
    {
		// $this->Tables->setTable($tableName);
        // $this->request->allowMethod(['post', 'delete']);

        // if ($this->Tables->delete($entry)) {
        //     $this->Flash->success(__('The table has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The table could not be deleted. Please, try again.'));
        // }
		$this->Applications->drop($tableName);
        return $this->redirect(['action' => 'index']);
    }

	public function createTable() {
		$this->Tables->createTable();
		echo "done";
	}
}
