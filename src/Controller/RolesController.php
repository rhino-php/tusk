<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;

/**
 * Tables Controller
 *
 * @method \Tusk\Model\Entity\Table[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController {
	public function index() {
		$roles = $this->paginate($this->Roles);
		$this->set(compact('roles'));
	}

	public function add() {
		$entry = $this->Roles->newEmptyEntity();
		$this->compose($entry, ['title' => 'Add']);
	}

	public function edit($id) {
		$entry = $this->Roles->get($id);
		$this->compose($entry, ['title' => 'Add']);
	}

	public function compose($entry, $params) {
		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			$table = $this->Roles->patchEntity($entry, $data);

			if ($this->Roles->save($table)) {
				$this->Flash->success(__('The entry has been saved.'), ['plugin' => 'Tusk']);

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The table could not be saved. Please, try again.'), ['plugin' => 'Tusk']);
		}

		$this->set(array_merge([
			'entry' => $entry
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