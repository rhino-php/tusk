<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;
use Tusk\Model\Table\GroupsTable;
use Tusk\Model\ApplicationTrait;

/**
 * Tables Controller
 *
 * @method \Tusk\Model\Entity\Table[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationsController extends AppController
{
	use ApplicationTrait;

	public function initialize(): void {
		parent::initialize();
		$this->Groups = new GroupsTable();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$groups = $this->Groups->find('all')->contain(['Applications'])->all()->toArray();

        $apps = $this->Applications->find()->where(
			function ($exp) {
				return $exp->isNotNull("tusk_group_id");
			}
		)->all()->toArray();

		$ungrouped = $this->Applications->getList(array_column($apps, 'name'));
		
		if (!empty($ungrouped)) {
			$groups[] = [
				"name" => "Ungrouped",
				"applications" => $ungrouped
			];
		}

        $this->set(compact('groups'));
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
    public function rename($tableName = null)
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

	public function edit($tableName) {
		$groups = $this->Groups->getGroups();
		$query = $this->Applications->find()->where(['Applications.name' => $tableName]);
		
		if ($query->isEmpty()) {
			$entry = $this->Applications->newEmptyEntity();
		} else {
			$entry = $query->first();
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			$application = $this->Applications->patchEntity($entry, $this->request->getData());
            
			if ($this->Applications->save($application)) {
				$this->Flash->success(__('The table has been saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
		
		$this->set([
			"tableName" => $tableName,
			'entry' => $entry,
			'groups' => $this->addEmptyOption($groups)
		]);
	}

	public function newGroup() {
        if ($this->request->is(['patch', 'post', 'put'])) {
			$entry = $this->Groups->newEmptyEntity();
            $group = $this->Groups->patchEntity($entry, $this->request->getData());
            
			if ($this->Groups->save($group)) {
                $this->Flash->success(__('The table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
	}
	
	public function renameGroup($id) {
		$entry = $this->Groups->find()->where(['id' => $id])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($entry, $this->request->getData());
            
			if ($this->Groups->save($group)) {
                $this->Flash->success(__('The table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }

		$this->set(['entity' => $entry]);
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
