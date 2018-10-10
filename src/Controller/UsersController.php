<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout']);
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

        $userToView = $this->Users->findById($id)->first();

        if ($userToView->id === $user['id'] && in_array($action, ['view', 'editStudent', 'editSuper'])) {
            return true;
        } else {
            return false;
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout() {
        $this->Flash->success('You are now logged out.');
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Students', 'Admins', 'Supervisors']
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addStudent() {

        $user = $this->Users->newEntity();
        $student = $this->Users->Students->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $student = $this->Users->Students->patchEntity($student, $this->request->getData());

            $this->verifyAndSaveStudent($user, $student);
        }

        $this->set(compact('user'));
    }

    public function addSuper() {

        $user = $this->Users->newEntity();
        $supervisor = $this->Users->Supervisors->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $supervisor = $this->Users->Supervisors->patchEntity($supervisor, $this->request->getData());

            $this->verifyAndSaveSupervisor($user, $supervisor);
        }

        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editStudent($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Students']
        ]);
        $student = $user['students'][0];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $student = $this->Users->Students->patchEntity($student, $this->request->getData());
            if ($this->Users->save($user)) {
                if ($this->Users->Students->save($student)) {
                    $this->Flash->success(__('The account has been saved.'));
                    return $this->redirect(['action' => 'view', $id]);
                }
            } else {
                $this->Flash->error(__('The account could not be saved. Please, try again.'));
            }
        }

        $user['student_number'] = $student->student_number;
        $user['last_name'] = $student->last_name;
        $user['first_name'] = $student->first_name;
        $user['phone'] = $student->phone;
        $user['info'] = $student->info;
        $user['grade'] = $student->grade;

        $this->set(compact('user'));
    }

    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Admins']
        ]);
        $admin = $user['admins'][0];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $admin = $this->Users->Admins->patchEntity($admin, $this->request->getData());
            if ($this->Users->save($user)) {
                if ($this->Users->Admins->save($admin)) {
                    $this->Flash->success(__('The account has been saved.'));
                    return $this->redirect(['action' => 'view', $id]);
                }
            } else {
                $this->Flash->error(__('The account could not be saved. Please, try again.'));
            }
        }

        $user['phone'] = $admin->phone;
        $user['name'] = $admin->name;

        $this->set(compact('user'));
    }

    public function editSuper($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Supervisors']
        ]);
        $supervisor = $user['supervisors'][0];
        unset($user['supervisors']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $supervisor = $this->Users->Supervisors->patchEntity($supervisor, $this->request->getData());
            if ($this->Users->save($user)) {
                $supervisor->phone = str_replace('-', '.', $supervisor->phone);
                $supervisor->cellphone = str_replace('-', '.', $supervisor->cellphone);
                $supervisor->fax = str_replace('-', '.', $supervisor->fax);
                if ($this->Users->Supervisors->save($supervisor)) {
                    $this->Flash->success(__('The account has been saved.'));
                    return $this->redirect(['action' => 'view', $id]);
                }
            } else {
                $this->Flash->error(__('The account could not be saved. Please, try again.'));
            }
        }
        $user['gender'] = $supervisor->gender;
        $user['last_name'] = $supervisor->last_name;
        $user['first_name'] = $supervisor->first_name;
        $user['phone'] = $supervisor->phone;
        $user['title'] = $supervisor->title;
        $user['city'] = $supervisor->city;
        $user['extension'] = $supervisor->extension;
        $user['cellphone'] = $supervisor->cellphone;
        $user['fax'] = $supervisor->fax;
        $user['location'] = $supervisor->location;
        $user['address'] = $supervisor->address;
        $user['province'] = $supervisor->province;
        $user['postal_code'] = $supervisor->postal_code;

        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verifyAndSaveSupervisor($user, $supervisor) {
        if ($this->Users->exists(['email' => $user->email])) {
            $this->Flash->error(__('The email exists already.'));
        } else {
            $this->saveUserSupervisor($user, $supervisor);
        }
    }

    public function saveUserSupervisor($user, $supervisor) {
        $user->email = strtolower($user->email);

        if ($this->Users->save($user)) {
            $supervisor->user_id = $user->id;

            $supervisor->phone = str_replace('-', '.', $supervisor->phone);
            $supervisor->cellphone = str_replace('-', '.', $supervisor->cellphone);
            $supervisor->fax = str_replace('-', '.', $supervisor->fax);

            if ($this->Users->Supervisors->save($supervisor)) {
                return $this->redirect(['controller' => 'Supervisors', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The account could not be saved. Please, try again.'));
            }
        }
    }

    public function verifyAndSaveStudent($user, $student) {
        if ($this->Users->exists(['email' => $user->email])) {
            $this->Flash->error(__('The email exists already.'));
        } else {
            $studentNumber = $student->student_number;

            if ($this->Users->Students->exists(['student_number' => $studentNumber])) {
                $this->Flash->error(__('The student number exists already.'));
            } else {
                $this->saveUserStudent($user, $student);
            }
        }
    }

    public function saveUserStudent($user, $student) {
        $user->email = strtolower($user->email);

        if ($this->Users->save($user)) {
            $student->user_id = $user->id;
            $student->phone = str_replace('-', '.', $student->phone);

            if ($this->Users->Students->save($student)) {
                $this->Flash->success(__('Your account is activated, please login'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            } else {
                $this->Flash->error(__('The account could not be saved. Please, try again.'));
            }
        }
    }

}
