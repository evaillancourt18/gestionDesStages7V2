<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupervisorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupervisorTable Test Case
 */
class SupervisorTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupervisorTable
     */
    public $Supervisor;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supervisor',
        'app.internship'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Supervisor') ? [] : ['className' => SupervisorTable::class];
        $this->Supervisor = TableRegistry::getTableLocator()->get('Supervisor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Supervisor);

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
