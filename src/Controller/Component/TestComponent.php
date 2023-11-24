<?php
namespace App\Controller\Component;

use Rhino\Controller\Component\PageComponent;

class TestComponent extends PageComponent {
    public function index() {
		dd($this);
    }
}