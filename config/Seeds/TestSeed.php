<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Test seed.
 */
class TestSeed extends AbstractSeed
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
                'name' => 'Foo',
                'active' => 1,
                'description' => 'Some Text',
                'count' => 1,
                'price' => 99.99,
                'categories' => '2',
                'modified' => '2023-11-15 16:52:58',
                'created' => '2023-11-10 12:17:03',
                'day' => '2023-11-10',
                'start_time' => '12:40:01',
                'image' => 'media/mark-harpur-K2s_YE031CA-unsplash.jpg',
                'position' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Baz',
                'active' => 1,
                'description' => '',
                'count' => 1,
                'price' => 34.33,
                'categories' => '',
                'modified' => '2023-11-15 16:52:58',
                'created' => '2023-11-10 12:17:03',
                'day' => '2023-11-10',
                'start_time' => '12:40:01',
                'image' => 'ales-krivec-4miBe6zg5r0-unsplash.jpg',
                'position' => 3,
            ],
            [
                'id' => 9,
                'name' => 'Some very Long Name',
                'active' => 1,
                'description' => '',
                'count' => 0,
                'price' => 99.99,
                'categories' => '',
                'modified' => '2023-11-15 16:52:58',
                'created' => '2023-11-10 12:17:16',
                'day' => '2023-11-10',
                'start_time' => '12:40:01',
                'image' => 'bailey-zindel-NRQV-hBF10M-unsplash.jpg',
                'position' => 1,
            ],
            [
                'id' => 14,
                'name' => 'Bar',
                'active' => 1,
                'description' => '',
                'count' => 0,
                'price' => 99.99,
                'categories' => '9',
                'modified' => '2023-11-15 16:52:58',
                'created' => '2023-11-15 16:50:28',
                'day' => '2023-03-22',
                'start_time' => '16:50:16',
                'image' => 'media/mark-harpur-K2s_YE031CA-unsplash.jpg',
                'position' => 4,
            ],
            [
                'id' => 15,
                'name' => '',
                'active' => 1,
                'description' => '',
                'count' => 0,
                'price' => 99.99,
                'categories' => '',
                'modified' => '2023-11-15 17:08:48',
                'created' => '2023-11-15 17:08:48',
                'day' => '2023-03-22',
                'start_time' => '17:08:29',
                'image' => 'mark-harpur-K2s_YE031CA-unsplash.jpg',
                'position' => 5,
            ],
            [
                'id' => 16,
                'name' => '',
                'active' => 1,
                'description' => '',
                'count' => 0,
                'price' => 99.99,
                'categories' => '',
                'modified' => '2023-11-15 17:27:22',
                'created' => '2023-11-15 17:27:22',
                'day' => '2023-03-22',
                'start_time' => '17:15:15',
                'image' => 'ales-krivec-4miBe6zg5r0-unsplash.jpg, bailey-zindel-NRQV-hBF10M-unsplash.jpg, mark-harpur-K2s_YE031CA-unsplash.jpg',
                'position' => 6,
            ],
            [
                'id' => 17,
                'name' => '',
                'active' => 1,
                'description' => '',
                'count' => 0,
                'price' => 99.99,
                'categories' => '',
                'modified' => '2023-11-15 17:35:35',
                'created' => '2023-11-15 17:27:45',
                'day' => '2023-03-22',
                'start_time' => '17:27:41',
                'image' => 'SWU_logo.svg',
                'position' => 7,
            ],
        ];

        $table = $this->table('test');
        $table->insert($data)->save();
    }
}
