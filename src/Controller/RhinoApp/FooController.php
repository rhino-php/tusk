<?php
namespace App\Controller\RhinoApp;

use Rhino\Controller\RhinoController;


class FooController extends RhinoController {
	public function initialize(): void {
		parent::initialize();
		// $this->setPlugin('Rhino');
	}
	
	public function index() {
		// dd($this->request);
		$this->set(['title' => 'Hello']);
	}

	public function view() {
		$this->set(['title'=> 'view']);
	}
}
