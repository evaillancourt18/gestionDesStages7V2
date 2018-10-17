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
     * Delete method
     *
     * @param string|null $id InternshipsStudent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $internshipsStudent = $this->InternshipsStudents->findById($id)->first();
        if ($this->InternshipsStudents->delete($internshipsStudent)) {
            $this->Flash->success(__('The internshipsStudent has been deleted.'));
        } else {
            $this->Flash->error(__('The internshipsStudent could not be deleted. Please, try again.'));
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

                return $this->redirect(['controller' => 'Internships', 'action' => 'index']);
            }
        }
            $this->Flash->error(__('The internships application could not be saved. Please, try again.'));
        
    }
	
	
}
