<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Fields seed.
 */
class FieldsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'name',
                'alias' => 'Name',
                'tableName' => 'test',
                'type' => 'string',
                'description' => '',
                'standard' => '',
                'settings' => '{"autosuggest":""}',
            ],
            [
                'id' => 2,
                'name' => 'active',
                'alias' => 'Aktiv',
                'tableName' => 'test',
                'type' => 'checkbox',
                'description' => '',
                'standard' => '1',
                'settings' => '{"checkboxStyle":"switch"}',
            ],
            [
                'id' => 3,
                'name' => 'description',
                'alias' => 'Beschreibung',
                'tableName' => 'test',
                'type' => 'text',
                'description' => '',
                'standard' => '',
                'settings' => '{"showEditor":""}',
            ],
            [
                'id' => 4,
                'name' => 'count',
                'alias' => 'Zähler',
                'tableName' => 'test',
                'type' => 'integer',
                'description' => '',
                'standard' => '0',
                'settings' => 'null',
            ],
            [
                'id' => 5,
                'name' => 'price',
                'alias' => 'Price',
                'tableName' => 'test',
                'type' => 'decimal',
                'description' => '',
                'standard' => '99.99',
                'settings' => '{"decimals":"2"}',
            ],
            [
                'id' => 6,
                'name' => 'categories',
                'alias' => 'Kategorie',
                'tableName' => 'test',
                'type' => 'select',
                'description' => '',
                'standard' => '',
                'settings' => '{"selectEmpty":"1","selectMultiple":"0","selectSeparator":",","selectKeys":"","selectValues":"","selectFromTable":"test","selectFromValue":"id","selectFromAlias":"name","selectFromSQL":"{\\"where\\": {\\"name IS NOT\\": \\"\\"},\\"orderBy\\": {\\"position\\": \\"ASC\\"}}"}',
            ],
            [
                'id' => 8,
                'name' => 'modified',
                'alias' => 'Berabeitet',
                'tableName' => 'test',
                'type' => 'dateTime',
                'description' => '',
                'standard' => '2023-11-10T10:55:21',
                'settings' => 'null',
            ],
            [
                'id' => 13,
                'name' => 'created',
                'alias' => 'Erstellt',
                'tableName' => 'test',
                'type' => 'dateTime',
                'description' => '',
                'standard' => '',
                'settings' => NULL,
            ],
            [
                'id' => 14,
                'name' => 'day',
                'alias' => 'Tag',
                'tableName' => 'test',
                'type' => 'date',
                'description' => '',
                'standard' => '2023-03-22T12:38:08',
                'settings' => NULL,
            ],
            [
                'id' => 15,
                'name' => 'start_time',
                'alias' => 'Start Zeit',
                'tableName' => 'test',
                'type' => 'time',
                'description' => '',
                'standard' => '13:38:56',
                'settings' => NULL,
            ],
            [
                'id' => 16,
                'name' => 'image',
                'alias' => 'Bild',
                'tableName' => 'test',
                'type' => 'upload',
                'description' => '',
                'standard' => 'media/mark-harpur-K2s_YE031CA-unsplash.jpg',
                'settings' => '{"uploadDirectory":"media\\/","uploadTypes":"png","uploadOverwrite":""}',
            ],
            [
                'id' => 17,
                'name' => 'position',
                'alias' => 'Position',
                'tableName' => 'test',
                'type' => 'position',
                'description' => '',
                'standard' => '0',
                'settings' => NULL,
            ],
        ];

        $table = $this->table('rhino_fields');
        $table->insert($data)->save();
    }
}
