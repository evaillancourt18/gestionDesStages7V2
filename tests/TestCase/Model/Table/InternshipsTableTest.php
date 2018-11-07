<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InternshipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InternshipsTable Test Case
 */
class InternshipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InternshipsTable
     */
    public $InternshipsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.internships',
        'app.supervisors',
        'app.missions',
        'app.types',
        'app.buildings_types',
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
        $config = TableRegistry::getTableLocator()->exists('Internships') ? [] : ['className' => InternshipsTable::class];
        $this->InternshipsTable = TableRegistry::getTableLocator()->get('Internships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InternshipsTable);

        parent::tearDown();
    }

    
    
        public function testSaving() {
            $data = ['id' => 25,
                'title' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'province' => 'Lorem ipsum dolor sit amet',
                'postal_code' => 'Lorem',
                'administrative_region' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'buildingType_id' => 1,
                'actif' => 0,
                'supervisor_id' => 1,
                'created' => null,
                'modified' => null
            ];
    
            $internship = $this->InternshipsTable->newEntity($data);
    
            $countBeforeSave = $this->InternshipsTable->find()->count();
    
            $this->InternshipsTable->save($internship);
    
            $countAfterSave = $this->InternshipsTable->find()->count();
    
            $this->assertEquals($countAfterSave, $countBeforeSave + 1);
        }
    
        public function testEditing() {
            $internship = $this->InternshipsTable->find('all', ['conditions' => ['internships.actif' => true]])->first();
    
            $id = $internship->id;
    
            $internship->actif = false;
            
            $this->InternshipsTable->save($internship);
    
            $internshipAfterSave = $this->InternshipsTable->find('all', ['conditions' => ['internships.id' => $id]])->first()->toArray();
    
            $this->assertEquals(false, $internshipAfterSave['actif']);
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
