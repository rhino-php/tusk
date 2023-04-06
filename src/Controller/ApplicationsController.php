<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;

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
			return $this->redirect(['action' => 'index']);
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
		$this->set([
			'data' => [
				"newName" => $tableName,
				"oldName" => $tableName,
			]
		]);

		if ($this->request->is('post')) {
			$data = $this->request->getData();
			$this->Applications->rename($data["oldName"], $data["newName"]);
			return $this->redirect(['action' => 'index']);
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
		$this->Applications->drop($tableName);
        return $this->redirect(['action' => 'index']);
    }

	public function createTable() {
		$this->Tables->createTable();
		 return $this->redirect(['action' => 'index']);
	}
}
