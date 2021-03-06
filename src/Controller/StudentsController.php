<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 *
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        if ( $user['role'] === 'supervisor' && $action === 'view' || $action === 'viewFile' || $action === 'indexActive' || $action === 'isTaken') {
            return true;
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($status = null)
    {
        if($status){
        $students = $this->paginate($this->Students->find('all', ['contain' =>['Users'],'conditions' => ['Students.taken' => false]]));
        
        }else{
        $students = $this->paginate($this->Students, ['contain' => ['Users']]);
        }
        $this->set(compact('students'));
    }

    public function indexActive()
    {
        $students = $this->paginate($this->Students, ['contain' => ['Users']]);

        $this->set(compact('students'));
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        $files = $this->Students->Files->findByStudentId($id)->toArray();

        $this->set(compact('student', 'files'));
    }

    public function viewFile($id = null)
    {
        $file = $this->Students->Files->findById($id)->first();
        $filepath = "Files/" . $file['path'] . $file['name'];
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
        
        $this->set(compact( 'file'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isTaken($id = null){
        $this->autoRender = false;

        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        $student['taken'] = true;

        if ($this->Students->save($student)) {
            $this->Flash->success(__('The student has been saved.'));

            return $this->redirect(['action' => 'indexActive']);
        }else{
            $this->Flash->success(__('The student could not be taken.'));
        }
        
    }
}
