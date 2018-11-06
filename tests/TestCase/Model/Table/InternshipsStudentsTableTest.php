<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipsStudentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * App\Model\Table\InternshipsStudentsTable Test Case
 */
class InternshipsStudentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipsStudentsTable
     */
    public $InternshipsStudentsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internships_students',
        'app.internships',
        'app.students'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InternshipsStudents') ? [] : ['className' => InternshipsStudentsTable::class];
        $this->InternshipsStudentsTable = TableRegistry::getTableLocator()->get('InternshipsStudents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InternshipsStudentsTable);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
