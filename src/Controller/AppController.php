<?php
declare(strict_types=1);

namespace Tusk\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
	public function initialize(): void
    {
        parent::initialize();
		$this->loadComponent('Authentication.Authentication');
		$this->loadComponent('Authorization.Authorization');

		$this->bootstrap();

		try {
			$this->Table = $this->fetchTable();
		} catch (\Throwable $th) {}
    }
	
	private function bootstrap() {
		$this->user = $this->Authentication->getIdentity();
		
		if (!empty($this->user)) {
			$this->set(['user' => $this->user]);
		}
	}

	public function compose($entry, $params) {
		$_params = [
			'success' => __('The entry has been saved.'),
			'error' => __('The entry could not be saved. Please, try again.'),
			'entity' => 'entry',
			'redirect' => ['action' => 'index'],
		];
		$params = array_merge($_params, $params);

		if (method_exists($this, 'preCompose')) {
			$entry = $this->preCompose($entry);
		}

		if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			$check = $this->save($entry, $params, $data);
			if ($check) {
				return $this->redirect($params['redirect']);
			}
		}

		$this->set([
			$params['entity'] => $entry,
			'action' => $this->request->getParam('action')
		]);

		try {
			return $this->render('compose');
		} catch (MissingTemplateException $exception) {
			if (Configure::read('debug')) {
				throw $exception;
			}
			throw new NotFoundException();
		}
	}

	public function save($entry, $params, $data) {
		if (method_exists($this, 'preSave')) {
			$data = $this->preSave($data);

			if ($data == false) {
				return false;
			}
		}

		$entry = $this->Table->patchEntity($entry, $data);

		if ($this->Table->save($entry)) {
			$this->Flash->success($params['success'], ['plugin' => 'Tusk']);
			return true;
		}

		$this->Flash->error($params['error']);
		return false;
	}
}
