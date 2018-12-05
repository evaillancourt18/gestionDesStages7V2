<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Supervisors Controller
 *
 * @property \App\Model\Table\SupervisorsTable $Supervisors
 *
 * @method \App\Model\Entity\Supervisor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SupervisorsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['verifyEdited']);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($status = null) {
        $supervisors = $this->paginate($this->Supervisors, ['contain' => ['Users']]);

        if($status === 'active') {
            
            $supervisors = $this->paginate($this->Supervisors->find('all', ['conditions' => ['Supervisors.active' => true]]));
        
        } else if ($status === 'inactive') {
            $supervisors = $this->paginate($this->Supervisors->find('all', ['conditions' => ['Supervisors.active' => false]]));
        
        } else {
            $supervisors = $this->paginate($this->Supervisors);
        }

        $this->set(compact('supervisors'));
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }
        
        $supervisor = $this->Supervisors->get($id, [
            'contain' => []
        ]);
        
        return $supervisor->user_id === $user['id'];
    }

    /**
     * View method
     *
     * @param string|null $id Supervisor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supervisor = $this->Supervisors->get($id, [
            'contain' => ['Internships', 'Users']
        ]);

        $this->set('supervisor', $supervisor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $supervisor = $this->Supervisors->newEntity();
		$supervisor->user_id = $id;
        if ($this->request->is('post')) {
            $supervisor = $this->Supervisors->patchEntity($supervisor, $this->request->getData());
            if ($this->Supervisors->save($supervisor)) {
                $this->Flash->success(__('The supervisor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supervisor could not be saved. Please, try again.'));
        }
        $this->set(compact('supervisor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supervisor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supervisor = $this->Supervisors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supervisor = $this->Supervisors->patchEntity($supervisor, $this->request->getData());
            if ($this->Supervisors->save($supervisor)) {
                $this->Flash->success(__('The supervisor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supervisor could not be saved. Please, try again.'));
        }
        $this->set(compact('supervisor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supervisor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supervisor = $this->Supervisors->get($id);
        if ($this->Supervisors->delete($supervisor)) {
            $this->Flash->success(__('The supervisor has been deleted.'));
        } else {
            $this->Flash->error(__('The supervisor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verifyEdited() {
        $supervisors = $this->Supervisors->find('all', ['conditions' => ['Supervisors.edit' => 0]]);

        foreach($supervisors as $supervisor) {
            $date = date('Y-m-d');

            $dateDiff = strtotime($date) - strtotime($supervisor->modified);

            $result = round($dateDiff / (60*60*24));

            if($result >= 15) {
                $this->email($supervisor->email);
            }
        }

        $this->autoRender = false;
    }

    public function email($address) {
        $email = new Email('default');
        $email->to($address);
        $email->subject(__("Votre compte n'a pas été modifié depuis 15 jours."));
        $email->send("Veuillez mettre à jour vos informations afin d'assurer la véracité de nos dossiers.");
    }
}
