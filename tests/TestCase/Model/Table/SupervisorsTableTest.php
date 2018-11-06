<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupervisorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupervisorsTable Test Case
 */
class SupervisorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupervisorsTable
     */
    public $SupervisorsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supervisors',
        'app.internships',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Supervisors') ? [] : ['className' => SupervisorsTable::class];
        $this->SupervisorsTable = TableRegistry::getTableLocator()->get('Supervisors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupervisorsTable);

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
     * Test findEdited method
     *
     * @return void
     */
    public function testFindEdited()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
