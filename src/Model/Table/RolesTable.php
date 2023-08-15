<?php
declare(strict_types=1);

namespace Tusk\Model\Table;

use Cake\ORM\Table;

class RolesTable extends Table {
	public function initialize(array $config): void {
		parent::initialize($config);

		$this->setTable('tusk_roles');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsToMany('Users', ['className' => 'Tusk.Users']);
	}
}