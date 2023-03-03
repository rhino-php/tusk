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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
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
    public function view($tableName = null)
    {
        $this->Tables->setTable($tableName);
		$schema = $this->Tables->getSchema($tableName);
		$data = $this->paginate($this->Tables);

        $this->set([
			'data' => $data,
			'columns' => $schema->columns(),
			'tableName' => $tableName
		]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($tableName = null)
    {
		$this->Tables->setTable($tableName);
		$schema = $this->Tables->getSchema($tableName);
        $entry = $this->Tables->newEmptyEntity();
        if ($this->request->is('post')) {
            $table = $this->Tables->patchEntity($entry, $this->request->getData());
            if ($this->Tables->save($entry)) {
                $this->Flash->success(__('The table has been saved.'));

                return $this->redirect(['action' => 'view', $tableName]);
            }
            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
		$this->set([
			'entry' => $entry,
			'columns' => $schema->columns()
		]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($tableName = null, $id = null)
    {
		$this->Tables->setTable($tableName);
		$schema = $this->Tables->getSchema($tableName);
        $entry = $this->Tables->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $table = $this->Tables->patchEntity($entry, $this->request->getData());
            if ($this->Tables->save($entry)) {
                $this->Flash->success(__('The entry has been saved.'));

                return $this->redirect(['action' => 'view', $tableName]);
            }
            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
        $this->set([
			'entry' => $entry,
			'columns' => $schema->columns()
		]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($tableName = null, $id = null)
    {
		$this->Tables->setTable($tableName);
        $this->request->allowMethod(['post', 'delete']);
        $entry = $this->Tables->get($id);
        if ($this->Tables->delete($entry)) {
            $this->Flash->success(__('The table has been deleted.'));
        } else {
            $this->Flash->error(__('The table could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view', $tableName]);
    }
}
