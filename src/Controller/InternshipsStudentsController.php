<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InternshipsStudents Controller
 *
 * @property \App\Model\Table\InternshipsStudentsTable $InternshipsStudents
 *
 * @method \App\Model\Entity\InternshipsStudent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipsStudentsController extends AppController
{

    public function isAuthorized($user) {

        if($user['role'] === 'student' || $user['role'] === 'admin') {
            return true;
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Internships', 'Students']
        ];
        $internshipsStudents = $this->paginate($this->InternshipsStudents);

        $this->set(compact('internshipsStudents'));
    }

    /**
     * View method
     *
     * @param string|null $id Internships Student id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internshipsStudent = $this->InternshipsStudents->get($id, [
            'contain' => ['Internships', 'Students']
        ]);

        $this->set('internshipsStudent', $internshipsStudent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $internshipsStudent = $this->InternshipsStudents->newEntity();
        if ($this->request->is('post')) {
            $internshipsStudent = $this->InternshipsStudents->patchEntity($internshipsStudent, $this->request->getData());
            if ($this->InternshipsStudents->save($internshipsStudent)) {
                $this->Flash->success(__('The internships student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internships student could not be saved. Please, try again.'));
        }
        $internships = $this->InternshipsStudents->Internships->find('list', ['limit' => 200]);
        $students = $this->InternshipsStudents->Students->find('list', ['limit' => 200]);
        $this->set(compact('internshipsStudent', 'internships', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internships Student id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $internshipsStudent = $this->InternshipsStudents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipsStudent = $this->InternshipsStudents->patchEntity($internshipsStudent, $this->request->getData());
            if ($this->InternshipsStudents->save($internshipsStudent)) {
                $this->Flash->success(__('The internships student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internships student could not be saved. Please, try again.'));
        }
        $internships = $this->InternshipsStudents->Internships->find('list', ['limit' => 200]);
        $students = $this->InternshipsStudents->Students->find('list', ['limit' => 200]);
        $this->set(compact('internshipsStudent', 'internships', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internships Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internshipsStudent = $this->InternshipsStudents->get($id);
        if ($this->InternshipsStudents->delete($internshipsStudent)) {
            $this->Flash->success(__('The internships student has been deleted.'));
        } else {
            $this->Flash->error(__('The internships student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function postuler($InternshipId  = null){
        $internshipsStudent = $this->InternshipsStudents->newEntity();
        if($InternshipId!=null){
        $internshipsStudent['internship_id'] = $InternshipId;
        $loguser = $this->request->session()->read('Auth.User');
        $student = $this->InternshipsStudents->Students->findByUserId($loguser['id'])->first();
        $internshipsStudent['student_id'] = $student['id'];
            if ($this->InternshipsStudents->save($internshipsStudent)) {
                $this->Flash->success(__('The internships application has been saved.'));

                return $this->redirect(['controller' => 'Internship', 'action' => 'index']);
            }
        }
            $this->Flash->error(__('The internships application could not be saved. Please, try again.'));
        
    }
}
