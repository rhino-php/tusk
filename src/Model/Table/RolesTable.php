<?php
declare(strict_types=1);

namespace Tusk\Model\Table;

use Cake\ORM\Table;

class RolesTable extends Table {

	public $accessTypes = [
		'view',
		'edit',
		'add',
		'delete'
	];

	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('tusk_roles');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsToMany('Users', ['className' => 'Tusk.Users']);
		$this->hasMany('Applications', ['className' => 'Tusk.Applications']);
	}

	public function beforeSave($event, $entity) {
		$blacklist = ["access", "modified"];
		$dirty = $entity->getDirty();
		$data = [];
		foreach ($dirty as $value) {
			$data[$value] = $entity[$value];
			unset($entity[$value]);
		}

		foreach ($blacklist as $value) {
			if (isset($data[$value])) {
				unset($data[$value]);
			}
		}

		$entity['input'] = json_encode($data);
		return $entity;
	}

	public function beforeMarshal($event, $data, $options) {

		$blacklist = ["id", "name", "access", "modified", "created"];
		$access = [];
		foreach ($data as $key => $value) {
			$access[$key] = $value;
			// unset($data[$key]);
		}

		foreach ($blacklist as $value) {
			if (isset($access[$value])) {
				unset($access[$value]);
			}
		}

		$data['access'] = json_encode($access);

		// echo '<pre>';
		// var_dump($data['name'], $data, $access);
		// die;
	}
}