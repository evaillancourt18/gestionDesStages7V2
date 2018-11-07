<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipsTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipsTypesTable Test Case
 */
class InternshipsTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipsTypesTable
     */
    public $InternshipsTypesTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internships_types',
        'app.internships',
        'app.types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InternshipsTypes') ? [] : ['className' => InternshipsTypesTable::class];
        $this->InternshipsTypesTable = TableRegistry::getTableLocator()->get('InternshipsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InternshipsTypesTable);

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
