<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

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
        $action = $this->request->getParam('action');
        if($user['role'] === 'student' && $action == 'postuler' || $action == 'index' ) {
            return true;
        }
        if($user['role'] === 'supervisor' && ($action == 'viewApplication' || $action == 'convoquer') ){
            return true;
        }
        if($user['role'] === 'admin'){
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
            $this->Flash->success(__('The internships application has been deleted.'));
        } else {
            $this->Flash->error(__('The internships application could not be deleted. Please, try again.'));
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

    public function APostuler($user, $id){
        $student = $this->InternshipsStudents->Students->findByUserId($user['id'])->first();
       
        $internshipsStudent = $this->InternshipsStudents->find('all', ['conditions' => ['InternshipsStudents.student_id'=> $student['id'], 'InternshipsStudents.internship_id'=> $id]])->first();
        if($internshipsStudent == null){
            return true;
        }else{
            return false;
        }
    }

    public function viewApplication ($id){
        $this->paginate = [
            'contain' => ['Internships', 'Students']
        ];
		$internshipsStudents = $this->paginate($this->InternshipsStudents);
        $internships = $this->InternshipsStudents->Internships->findById($id)->first();
        $this->set(compact('internshipsStudents','internships'));
    }

    public function convoquer($id){
        $InternshipsStudents = $this->InternshipsStudents->findById($id)->first();
        $student = $this->InternshipsStudents->Students->findById($InternshipsStudents['student_id'])->first();
        $user = $this->InternshipsStudents->Students->Users->findById($student['user_id'])->first();
        $internship = $this->InternshipsStudents->Internships->findById($InternshipsStudents['internship_id'])->first();
        $email = new Email('default');
        $email->to($user['email']);
        $email->subject(__('Vous avez été convoquer pour une entrevue'));
        $email->send('Titre: ' . $internship->title . "\r\n" . 
                     'Adresse: ' . $internship->address . "\r\n" .
                     'Ville: ' . $internship->city . "\r\n" . 
                     'Description: ' . $internship->description 
                    );


        return $this->redirect(['controller' => 'Internships', 'action' => 'index']);
                    
        
    }
	
	
}
