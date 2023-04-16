<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Tusk\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Tusk\Controller\AppController as BaseController;
use Tusk\Model\ApplicationTrait;

use Tusk\Model\Table\PagesTable;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class ContentsController extends BaseController {
	use ApplicationTrait;

	public function initialize(): void {
		parent::initialize();
		$this->Pages = new PagesTable();
    }

	public function change(int $pageId, int $id = null) {
		$entry = $this->Contents->newEmptyEntity();
		$page = $this->Pages->get($pageId);
		$pages = $this->Contents->Pages->find('list');
		$elements = $this->Contents->Elements->find('list');

		if ($this->request->is(['patch', 'post', 'put'])) {
			$content = $this->Contents->patchEntity($entry, $this->request->getData());
            
			if ($this->Contents->save($content)) {
				$this->Flash->success(__('The table has been saved.'));
                return $this->redirect([
					'controller' => 'Pages',
					'action' => 'edit',
					$page['id']
				]);
            }
			
            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
		
		$this->set([
			'entry' => $entry,
			'page' => $page,
			'elements' => $elements,
		]);
	}

	public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);
        $entry = $this->Contents->get($id);
        if ($this->Contents->delete($entry)) {
            $this->Flash->success(__('The table has been deleted.'));
        } else {
            $this->Flash->error(__('The table could not be deleted. Please, try again.'));
        }

        return $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
