<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildingsTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildingsTypesTable Test Case
 */
class BuildingsTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildingsTypesTable
     */
    public $BuildingsTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.buildings_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BuildingsTypes') ? [] : ['className' => BuildingsTypesTable::class];
        $this->BuildingsTypes = TableRegistry::getTableLocator()->get('BuildingsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BuildingsTypes);

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
