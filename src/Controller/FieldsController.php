<?php
declare(strict_types=1);

namespace Tusk\Controller;

use Tusk\Controller\AppController;

class FieldsController extends AppController
{
    public function index()
    {
        $applications = $this->Applications->getList();
        $this->set(compact('applications'));
    }

    public function add(string $tableName) {
		$this->set(["tableName" => $tableName]);

        if ($this->request->is('post')) {
			$data = $this->request->getData();
			$this->Fields->create($data['table'], $data);
			return $this->redirect(["controller" => "Applications", 'action' => 'view', $data['table']]);
        }
    }

    public function edit(string $tableName)
    {

    }

    public function delete(string $tableName)
    {
	
    }
}
