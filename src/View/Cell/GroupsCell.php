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

		// ToDo: Contain bricks new installs?
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
						'icon' => "Tusk.home"
					]
				]
			],
			[
				'heading' => 'Standartfunktionen',
				"buttons" => [
					[
						'name' => 'Seiten',
						'link' => ['controller' => 'Pages', 'action' => 'index'],
						'icon' => "Tusk.file"
					],
					[
						'name' => 'Medien',
						'link' => ['controller' => 'Media', 'action' => 'index'],
						'icon' => "Tusk.image"
					],
					[
						'name' => 'Widgets',
						'link' => ['controller' => 'Widgets', 'action' => 'index'],
						'icon' => "Tusk.sidebar"
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
						'icon' => "Tusk.table",
						'buttons' => [
							[
								'name' => 'Elements',
								'icon' => "Tusk.book",
								'link' => ['controller' => 'Tables', 'action' => 'view', 'tusk_elements']
							],
							[
								'name' => 'Layouts',
								'icon' => "Tusk.book",
								'link' => ['controller' => 'Tables', 'action' => 'view', 'tusk_layouts']
							]
						]
					],
					[
						'name' => 'Benutzerverwaltung',
						'icon' => "Tusk.users",
						'buttons' => [
							[
								'name' => 'Nutzerverwaltung',
								'icon' => "Tusk.users",
								'link' => ['controller' => 'Users']
							],
							[
								'name' => 'Rechteverwaltung',
								'icon' => "Tusk.lock",
								'link' => '/'
							]
						]
					],
					[
						'name' => 'Admin',
						'icon' => "Tusk.settings",
						'buttons' => [
							[
								'name' => 'Applikation-Manager',
								'icon' => "Tusk.book",
								'link' => ['controller' => 'Applications', "action" => "index"]
							]
						]
					],
					[
						'name' => 'Profil',
						'icon' => "Tusk.user",
						'buttons' => [
							[
								'name' => 'Profil bearbeiten',
								'icon' => "Tusk.edit",
								'link' => ["controller" => "Users", "action" => "edit", $user->id]
							],
							[
								'name' => 'log-out',
								'icon' => "Tusk.log-out",
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
