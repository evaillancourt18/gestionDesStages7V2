<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MissionsTable Test Case
 */
class MissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MissionsTable
     */
    public $MissionsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.missions',
        'app.internships'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Missions') ? [] : ['className' => MissionsTable::class];
        $this->MissionsTable = TableRegistry::getTableLocator()->get('Missions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MissionsTable);

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
}
