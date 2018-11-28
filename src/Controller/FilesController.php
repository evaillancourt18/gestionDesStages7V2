<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['view']);
    }

    public function isAuthorized($user) {
        if($user['role'] == 'student'){
            return true;
        }
        parent::isAuthorized($user);
        
     
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $loguser = $this->request->session()->read('Auth.User');
        $student = $this->Files->Students->findByUserId($loguser['id'])->first();
        $id = $student['id'];
        $files = $this->paginate($this->Files);

        $this->set(compact('files','id'));
    }

    /**
     * View method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => []
        ]);

        $this->set('file', $file);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $loguser = $this->request->session()->read('Auth.User');
        $student = $this->Files->Students->findByUserId($loguser['id'])->first();

        $file = $this->Files->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['name']['name'])) {
                $fileName = $student['id'] . "_" . $this->request->data['name']['name'];
                $uploadPath = 'students/';
                $uploadFile = $uploadPath . $fileName;

                

                if(file_exists('Files/' . $uploadFile)){
                    $this->Flash->error(__('Unable to upload file, File with the same name exists.'));
                } else {
                    if(filesize($this->request->data['name']['tmp_name']) > 18){
                        $this->Flash->error(__('Unable to upload file, File is too large.'));
                    }else{
                if (move_uploaded_file($this->request->data['name']['tmp_name'], 'Files/' . $uploadFile)) {
                    $file = $this->Files->patchEntity($file, $this->request->getData());
                    $file->name = $fileName;
                    $file->path = $uploadPath;
                    $file->student_id = $student['id'];
                    if ($this->Files->save($file)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                        return $this->redirect(['controller' => 'Files' , 'action' => 'index', ""]);
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                
                } else {
                    $this->Flash->error(__('Unable to save file, please try again.'));
                }
            }
        }
            } else {
                $this->Flash->error(__('Please choose a file to upload.'));
            }
        }
                $this->set(compact('file'));
    }


    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id);
        if ($this->Files->delete($file)) {
            $uploadFile = $file['path'] . $file['name'];
            unlink('Files/' . $uploadFile);
            $this->Flash->success(__('The file has been deleted.'));
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Files' ,'action' => 'index',""]);
    }
}
