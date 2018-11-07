<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipsMissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipsMissionsTable Test Case
 */
class InternshipsMissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipsMissionsTable
     */
    public $InternshipsMissionsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internships_missions',
        'app.internships',
        'app.missions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InternshipsMissions') ? [] : ['className' => InternshipsMissionsTable::class];
        $this->InternshipsMissionsTable = TableRegistry::getTableLocator()->get('InternshipsMissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InternshipsMissionsTable);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
