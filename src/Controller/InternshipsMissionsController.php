<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InternshipsMissions Controller
 *
 * @property \App\Model\Table\InternshipsMissionsTable $InternshipsMissions
 *
 * @method \App\Model\Entity\InternshipsMission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipsMissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Internships', 'Missions']
        ];
        $internshipsMissions = $this->paginate($this->InternshipsMissions);

        $this->set(compact('internshipsMissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Internships Mission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internshipsMission = $this->InternshipsMissions->get($id, [
            'contain' => ['Internships', 'Missions']
        ]);

        $this->set('internshipsMission', $internshipsMission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $internshipsMission = $this->InternshipsMissions->newEntity();
        if ($this->request->is('post')) {
            $internshipsMission = $this->InternshipsMissions->patchEntity($internshipsMission, $this->request->getData());
            if ($this->InternshipsMissions->save($internshipsMission)) {
                $this->Flash->success(__('The internships mission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internships mission could not be saved. Please, try again.'));
        }
        $internships = $this->InternshipsMissions->Internships->find('list', ['limit' => 200]);
        $missions = $this->InternshipsMissions->Missions->find('list', ['limit' => 200]);
        $this->set(compact('internshipsMission', 'internships', 'missions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internships Mission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $internshipsMission = $this->InternshipsMissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipsMission = $this->InternshipsMissions->patchEntity($internshipsMission, $this->request->getData());
            if ($this->InternshipsMissions->save($internshipsMission)) {
                $this->Flash->success(__('The internships mission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internships mission could not be saved. Please, try again.'));
        }
        $internships = $this->InternshipsMissions->Internships->find('list', ['limit' => 200]);
        $missions = $this->InternshipsMissions->Missions->find('list', ['limit' => 200]);
        $this->set(compact('internshipsMission', 'internships', 'missions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internships Mission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internshipsMission = $this->InternshipsMissions->get($id);
        if ($this->InternshipsMissions->delete($internshipsMission)) {
            $this->Flash->success(__('The internships mission has been deleted.'));
        } else {
            $this->Flash->error(__('The internships mission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
