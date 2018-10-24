<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipsstudentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipsstudentsTable Test Case
 */
class InternshipsstudentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipsstudentsTable
     */
    public $Internshipsstudents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internshipsstudents',
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
        $config = TableRegistry::getTableLocator()->exists('Internshipsstudents') ? [] : ['className' => InternshipsstudentsTable::class];
        $this->Internshipsstudents = TableRegistry::getTableLocator()->get('Internshipsstudents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Internshipsstudents);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
