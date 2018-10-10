<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InternshipsTypes Controller
 *
 * @property \App\Model\Table\InternshipsTypesTable $InternshipsTypes
 *
 * @method \App\Model\Entity\InternshipsType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipsTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Internships', 'Types']
        ];
        $internshipsTypes = $this->paginate($this->InternshipsTypes);

        $this->set(compact('internshipsTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Internships Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internshipsType = $this->InternshipsTypes->get($id, [
            'contain' => ['Internships', 'Types']
        ]);

        $this->set('internshipsType', $internshipsType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $internshipsType = $this->InternshipsTypes->newEntity();
        if ($this->request->is('post')) {
            $internshipsType = $this->InternshipsTypes->patchEntity($internshipsType, $this->request->getData());
            if ($this->InternshipsTypes->save($internshipsType)) {
                $this->Flash->success(__('The internships type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internships type could not be saved. Please, try again.'));
        }
        $internships = $this->InternshipsTypes->Internships->find('list', ['limit' => 200]);
        $types = $this->InternshipsTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('internshipsType', 'internships', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internships Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $internshipsType = $this->InternshipsTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipsType = $this->InternshipsTypes->patchEntity($internshipsType, $this->request->getData());
            if ($this->InternshipsTypes->save($internshipsType)) {
                $this->Flash->success(__('The internships type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internships type could not be saved. Please, try again.'));
        }
        $internships = $this->InternshipsTypes->Internships->find('list', ['limit' => 200]);
        $types = $this->InternshipsTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('internshipsType', 'internships', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internships Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internshipsType = $this->InternshipsTypes->get($id);
        if ($this->InternshipsTypes->delete($internshipsType)) {
            $this->Flash->success(__('The internships type has been deleted.'));
        } else {
            $this->Flash->error(__('The internships type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
