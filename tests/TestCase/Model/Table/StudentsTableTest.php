<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * App\Model\Table\StudentsTable Test Case
 */
class StudentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentsTable
     */
    public $StudentsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students',
        'app.users',
        'app.internships',
        'app.internships_students'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Students') ? [] : ['className' => StudentsTable::class];
        $this->StudentsTable = TableRegistry::getTableLocator()->get('Students', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentsTable);

        parent::tearDown();
    }

    public function testFindActif() {

    $query = $this->StudentsTable->find('actif');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'user_id' => 1,
                'student_number' => 111111111,
                'last_name' => 'Test One',
                'first_name' => 'Test One',
                'phone' => '450-111-1111',
                'info' => 'Test',
                'grade' => 1,
                'actif' => 1
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'student_number' => 333333333,
                'last_name' => 'Test Three',
                'first_name' => 'Test Three',
                'phone' => '450-333-3333',
                'info' => 'Test',
                'grade' => 1,
                'actif' => 1
            ]
        ];

        $this->assertEquals($expected, $result);
    }

    public function testSaving() {
        $data = [
            'id' => 4,
            'user_id' => 1,
            'student_number' => 444444444,
            'last_name' => 'Test Four',
            'first_name' => 'Test Four',
            'phone' => '450-444-4444',
            'info' => 'Test',
            'grade' => 1,
            'actif' => 1
        ];

        $student = $this->StudentsTable->newEntity($data);

        $countBeforeSave = $this->StudentsTable->find()->count();

        $this->StudentsTable->save($student);

        $countAfterSave = $this->StudentsTable->find()->count();

        $this->assertEquals($countAfterSave, $countBeforeSave + 1);
    }

    public function testEditing() {
        $student = $this->StudentsTable->find('all', ['conditions' => ['Students.actif' => false]])->first();

        $id = $student->id;

        $student->actif = true;
        
        $this->StudentsTable->save($student);

        $studentAfterSave = $this->StudentsTable->find('all', ['conditions' => ['Students.id' => $id]])->first()->toArray();

        $this->assertEquals(true, $studentAfterSave['actif']);
    }

    public function testDeleting() {
        $countBeforeDelete = $this->StudentsTable->find()->count();

        $student = $this->StudentsTable->find()->first();

        $this->StudentsTable->delete($student);

        $countAfterDelete = $this->StudentsTable->find()->count();

        $this->assertEquals($countAfterDelete, $countBeforeDelete - 1);
    }

    public function testValidateStudentNumberFail () {
        $student = $this->StudentsTable->find('all')->first()->toArray();
        $student['student_number'] = '123';

        $errors = $this->StudentsTable->validationDefault(new Validator())->errors($student);

        $this->assertTrue(empty($errors['student_number']));
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
