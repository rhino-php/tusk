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
    }
	
	private function bootstrap() {
		$user = ($this->Authentication->getIdentity());
		
		if (!empty($user)) {
			$this->set(['user' => $user]);
		}
	}
}
