<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InternshipsMissionsFixture
 *
 */
class InternshipsMissionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'internship_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mission_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_mission' => ['type' => 'index', 'columns' => ['mission_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['internship_id', 'mission_id'], 'length' => []],
            'internships_missions_ibfk_1' => ['type' => 'foreign', 'columns' => ['internship_id'], 'references' => ['internships', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'internships_missions_ibfk_2' => ['type' => 'foreign', 'columns' => ['mission_id'], 'references' => ['missions', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'mission_id' => 1
            ],
        ];
        parent::init();
    }
}
