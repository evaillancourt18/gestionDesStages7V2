<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InternshipsStudentsFixture
 *
 */
class InternshipsStudentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'internship_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'student_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'student_id' => ['type' => 'index', 'columns' => ['student_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['internship_id', 'student_id'], 'length' => []],
            'internships_students_ibfk_1' => ['type' => 'foreign', 'columns' => ['internship_id'], 'references' => ['internships', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'internships_students_ibfk_2' => ['type' => 'foreign', 'columns' => ['student_id'], 'references' => ['students', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'internship_id' => 1,
                'student_id' => 1
            ],
        ];
        parent::init();
    }
}
