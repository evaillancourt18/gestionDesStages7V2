<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StudentsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\StudentsController Test Case
 */
class StudentsControllerTest extends IntegrationTestCase
{

    public function setUp()
    {
        parent::setUp();

        $this->Students = TableRegistry::get('Students');

        $usersTable = TableRegistry::get('users');
        $user = $usersTable->find('all', ['conditions' => ['Users.role' => 'admin']])->first()->toArray();
        $this->AuthAdmin = [
            'Auth' => [
                'User' => $user
            ]
        ];
    }

    public function tearDown()
    {
        unset($this->AuthAdmin);
        unset($this->Students);

        parent::tearDown();
    }


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
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session($this->AuthAdmin);

        $this->get('/students');

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->session($this->AuthAdmin);

        $this->get('/students/view/1');

        //echo $this->_response->body();
        $this->assertResponseContains('Test One');
        $this->assertResponseOk();
    }

    public function testAdd()
    {
        $this->session($this->AuthAdmin);

        $this->get('users/add-student');

        $this->assertResponseOk();
    }

    public function testDeleteUnauthenticatedFail() {
        $this->get('/students/delete/1');

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login', 'redirect'=> '/students/delete']);
        //$this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session($this->AuthAdmin);

        $newName = 'Test Student Edit';

        $student = $this->Students->find('all')->first();
        $student->name = $newName;

        $studentId = $student->id;

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/students/edit/' . $studentId);

        //echo $this->_response->body();
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session($this->AuthAdmin);

        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/students/delete/1');

        echo $this->_response->body();
        $this->assertResponseSuccess();

   
    }
}
