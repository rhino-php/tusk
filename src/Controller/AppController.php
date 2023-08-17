<?php
declare(strict_types=1);

namespace Tusk\Controller;

use App\Controller\AppController as BaseController;
use Tusk\Handlers\FieldHandler;
use Cake\Http\Response;

class AppController extends BaseController
{
	public function initialize(): void
    {
        parent::initialize();
		$this->loadComponent('Authentication.Authentication');
		$this->loadComponent('Authorization.Authorization');

		$this->bootstrap();

		$this->FieldHandler = new FieldHandler();
		$this->useTable = false;
		
		try {
			$this->Table = $this->fetchTable();
			$this->useTable = true;
		} catch (\Throwable $th) {}
    }
	
	private function bootstrap() {
		$this->user = $this->Authentication->getIdentity();
		
		if (!empty($this->user)) {
			$this->set(['user' => $this->user]);
		}
	}

	public function compose($entry, $params = []) {
		$action = $this->request->getParam('action');
		$_params = [
			'success' => __('The entry has been saved.'),
			'error' => __('The entry could not be saved. Please, try again.'),
			'entity' => 'entry',
			'redirect' => ['action' => 'index'],
			'action' => $action
		];
		$params = array_merge($_params, $params);

		if (method_exists($this, 'preCompose')) {
			$pass = $this->request->getParam('pass');
			$return = $this->preCompose($entry, ...$pass);
			if (!empty($return)) {
				$entry = $return;
			}
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
			'action' => $action,
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
		$tableName = $this->Table->getTable();
		$data = $this->FieldHandler->setFields($tableName, $data);
		
		if (method_exists($this, 'preSave')) {
			$data = $this->preSave($data, $params);
			
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

	public function render(?string $template = null, ?string $layout = null): Response {
		$this->viewBuilder()->addHelper('Tusk.Fields');

		if ($this->useTable) {
			$tableName = $this->Table->getTable();
			$fields = $this->FieldHandler->getFields($tableName);
			$this->set([
				'fields' => $fields
			]);
		}

		return parent::render($template, $layout);
	}
}
