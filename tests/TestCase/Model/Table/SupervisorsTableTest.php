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
    public $Supervisors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supervisors',
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
        $config = TableRegistry::getTableLocator()->exists('Supervisors') ? [] : ['className' => SupervisorsTable::class];
        $this->Supervisors = TableRegistry::getTableLocator()->get('Supervisors', $config);
    }

    public function testFindEdited(){
        $query = $this->Supervisors->find('edited');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 3,
                'user_id' => 17,
                'gender' => 'Male',
                'first_name' => 'Roger',
                'last_name' => 'Michel',
                'title' => 'test',
                'location' => 'Rue Test',
                'address' => 'Test 1',
                'city' => 'Test1000',
                'province' => 'Test',
                'postal_code' => 'Test',
                'email' => 'michel@mail.com',
                'phone' => '450.111.1111',
                'extension' => '1114',
                'cellphone' => '450.111.1117',
                'fax' => '450.111.1112',
                'modified' => null,
                'edit' => true
            ],
            [
                'id' => 5,
                'user_id' => 19,
                'gender' => 'Female',
                'first_name' => 'Mary',
                'last_name' => 'Popins',
                'title' => 'Bell',
                'location' => 'Canada',
                'address' => '111 Rue Test',
                'city' => 'Montréal',
                'province' => 'Québec',
                'postal_code' => 'H2A2A2',
                'email' => 'et_202@hotmail.com',
                'phone' => '450.222.2222',
                'extension' => '444',
                'cellphone' => '450.222.2222',
                'fax' => '450.222.2222',
                'modified' => null,
                'edit' => true
            ]
        ];

        $this->assertEquals($expected, $result);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Supervisors);

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
