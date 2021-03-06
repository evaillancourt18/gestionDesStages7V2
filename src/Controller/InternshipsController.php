<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;



/**
 * Internships Controller
 *
 * @property \App\Model\Table\InternshipsTable $Internships
 *
 * @method \App\Model\Entity\Internship[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipsController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index']);
    }
    
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        if($action === 'view' &&  $user['role'] === 'student') {
            return true;
        }

        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        if ((isset($user['role']) && $user['role'] === 'supervisor') && $action === 'add') {
            return true;
        }

        $internship = $this->Internships->get($id, [
            'contain' => ['Supervisors']
        ]);

        return $internship['supervisor']->user_id === $user['id'];
    }
    
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($status = null)
    {
        $this->paginate = [
            'contain' => ['Supervisors', 'BuildingsTypes']
        ];
        
        $this->paginate = [
            'contain' => ['Supervisors', 'BuildingsTypes']
        ];
        $internships = $this->paginate($this->Internships);
        

        $this->set(compact('internships'));
    }

    /**
     * View method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internship = $this->Internships->get($id, [
            'contain' => ['Supervisors', 'Missions', 'Types', 'BuildingsTypes']
        ]);
        $test = new InternshipsStudentsController;
        $postuler = $test->APostuler($this->request->session()->read('Auth.User') ,$id);

        $this->set(compact('internship', 'postuler'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {
        $internship = $this->Internships->newEntity();
        if ($this->request->is('post')) {
            $internship = $this->Internships->patchEntity($internship, $this->request->getData());          
            if ($this->Internships->save($internship)) {
                $this->Flash->success(__('The internship has been saved.'));

                $users = $this->Internships->Supervisors->Users->find('all' , ['conditions' => ['Users.role' => 'student']])->toArray();
                $supervisor = $this->Internships->Supervisors->get($internship->supervisor_id, [
                    'contain' => []
                ]);
                
                foreach($users as $user) {                    
                    $this->email($user->email, $internship, $supervisor);      
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship could not be saved. Please, try again.'));
        }
        $buildingsTypes = $this->Internships->BuildingsTypes->find('list', ['limit' => 200]);
        $querySupervisors = $this->Internships->Supervisors->find('all', ['conditions' => ['Supervisors.user_id' => $id]]);
        $supervisor = $querySupervisors->toArray();
        $missions = $this->Internships->Missions->find('list', ['limit' => 200]);
        $types = $this->Internships->Types->find('list', ['limit' => 200]);
        $this->set(compact('internship', 'buildingsTypes', 'supervisor', 'missions', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $internship = $this->Internships->get($id, [
            'contain' => ['Missions', 'Types']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internship = $this->Internships->patchEntity($internship, $this->request->getData());
            if ($this->Internships->save($internship)) {
                $this->Flash->success(__('The internship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship could not be saved. Please, try again.'));
        }
        $buildingsTypes = $this->Internships->BuildingsTypes->find('list', ['limit' => 200]);
        $supervisors = $this->Internships->Supervisors->find('list', ['limit' => 200]);
        $missions = $this->Internships->Missions->find('list', ['limit' => 200]);
        $types = $this->Internships->Types->find('list', ['limit' => 200]);
        $this->set(compact('internship', 'supervisors', 'missions', 'types', 'buildingsTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internship = $this->Internships->get($id);
        if ($this->Internships->delete($internship)) {
            $this->Flash->success(__('The internship has been deleted.'));
        } else {
            $this->Flash->error(__('The internship could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function email($address, $internship, $supervisor) {
        $phone = $supervisor->phone;
        $phone = str_replace('.', '-', $phone);
        
        $email = new Email('default');
        $email->to($address);
        $email->subject(__('Un nouvel offre de stage est disponible'));
        $email->send('Titre: ' . $internship->title . "\r\n" . 
                     'Adresse: ' . $internship->address . "\r\n" .
                     'Ville: ' . $internship->city . "\r\n" . 
                     'Description: ' . $internship->description . "\r\n" .
                     'Téléphone: ' . $phone
                    );
    }
}
