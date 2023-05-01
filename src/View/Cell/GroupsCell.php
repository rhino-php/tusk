<?php
declare(strict_types=1);

namespace Tusk\View\Cell;

use Cake\View\Cell;

/**
 * Sidebar cell
 */
class GroupsCell extends Cell {
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array<string, mixed>
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void {
		$this->Groups = $this->fetchTable('Tusk.Groups');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display() {
		$user = $this->request->getAttribute('authentication')->getIdentity();

		$_groups = $this->Groups->find('all')->contain(['Applications'])->all();
		$groups = [];

		foreach ($_groups as $group) {
			$apps = [];
			foreach ($group['applications'] as $app) {
				$apps[] = [
					'name' => isset($app['alias']) ? $app['alias'] : $app["name"],
					'icon' => null,
					'link' => ['controller' => 'Tables', "action" => "view", $app['name']],
				]; 
			}

			$groups[] = [
				'name' => $group["name"],
				'icon' => null,
				'buttons' => $apps
			];
		}

		$navs = [
			[
				'heading' => 'Angemeldet als ' . $user->name,
				"buttons" => [
					[
						'name' => 'Dashboard',
						'link' => ['controller' => 'Overview', 'action' => 'display', 'home'],
						'icon' => "icon/home.svg"
					]
				]
			],
			[
				'heading' => 'Standartfunktionen',
				"buttons" => [
					[
						'name' => 'Seiten',
						'link' => ['controller' => 'Pages', 'action' => 'index'],
						'icon' => "icon/file.svg"
					],
					[
						'name' => 'Medien',
						'link' => ['controller' => 'Media', 'action' => 'index'],
						'icon' => "icon/image.svg"
					],
					[
						'name' => 'Widgets',
						'link' => ['controller' => 'Widgets', 'action' => 'index'],
						'icon' => "icon/sidebar.svg"
					]
				]
			],
			[
				'heading' => 'Standartfunktionen',
				'buttons' => $groups
			],
			[
				'heading' => 'Einstellungen',
				"buttons" => [
					[
						'name' => 'Templates',
						'icon' => "icon/table.svg",
						'buttons' => [
							[
								'name' => 'Elements',
								'icon' => "icon/book.svg",
								'link' => ['controller' => 'Tables', 'action' => 'view', 'tusk_elements']
							],
							[
								'name' => 'Layouts',
								'icon' => "icon/book.svg",
								'link' => ['controller' => 'Tables', 'action' => 'view', 'tusk_layouts']
							]
						]
					],
					[
						'name' => 'Benutzerverwaltung',
						'icon' => "icon/users.svg",
						'buttons' => [
							[
								'name' => 'Nutzerverwaltung',
								'icon' => "icon/users.svg",
								'link' => ['controller' => 'Users']
							],
							[
								'name' => 'Rechteverwaltung',
								'icon' => "icon/lock.svg",
								'link' => '/'
							]
						]
					],
					[
						'name' => 'Admin',
						'icon' => "icon/settings.svg",
						'buttons' => [
							[
								'name' => 'Applikation-Manager',
								'icon' => "icon/book.svg",
								'link' => ['controller' => 'Applications', "action" => "index"]
							]
						]
					],
					[
						'name' => 'Profil',
						'icon' => "icon/user.svg",
						'buttons' => [
							[
								'name' => 'Profil bearbeiten',
								'icon' => "icon/edit.svg",
								'link' => ["controller" => "Users", "action" => "edit", $user->id]
							],
							[
								'name' => 'log-out',
								'icon' => "icon/log-out.svg",
								'link' => ["controller" => "Users", "action" => "logout"]
							]
						]
					]
				],
			]
		];

		$this->set(["navs" => $navs]);
    }
}
