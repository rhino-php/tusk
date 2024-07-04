<?php

declare(strict_types=1);

namespace App\Model\Table;

use Rhino\Model\Table\AppTable;

class TestTable extends AppTable {
	public array $fieldConfig = [
		'position' => [
			'alias' => 'Reihenfolge',
			'type' => 'position',
		],
		'image' => [
			'type' => 'upload',
		],
	];

	public array $overView = [
		'id',
		'name',
		'active',
		'count',
		'position',
	];

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config): void {
		parent::initialize($config);
	}
}
