<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Test extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up(): void
    {
        $this->table('test')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('active', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('count', 'integer', [
                'default' => '0',
                'limit' => null,
                'null' => true,
                'signed' => true,
            ])
            ->addColumn('price', 'float', [
                'default' => '99.99',
                'limit' => null,
                'null' => true,
                'signed' => true,
            ])
            ->addColumn('categories', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'current_timestamp()',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'current_timestamp()',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('day', 'date', [
                'default' => '2023-03-22',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('start_time', 'time', [
                'default' => 'current_timestamp()',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('image', 'string', [
                'default' => 'media/mark-harpur-K2s_YE031CA-unsplash.jpg',
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('position', 'integer', [
                'default' => '0',
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->create();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down(): void
    {
        $this->table('test')->drop()->save();
    }
}
