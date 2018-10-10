<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BuildingsTypes Controller
 *
 * @property \App\Model\Table\BuildingsTypesTable $BuildingsTypes
 *
 * @method \App\Model\Entity\BuildingsType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuildingsTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $buildingsTypes = $this->paginate($this->BuildingsTypes);

        $this->set(compact('buildingsTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Buildings Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $buildingsType = $this->BuildingsTypes->get($id, [
            'contain' => []
        ]);

        $this->set('buildingsType', $buildingsType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $buildingsType = $this->BuildingsTypes->newEntity();
        if ($this->request->is('post')) {
            $buildingsType = $this->BuildingsTypes->patchEntity($buildingsType, $this->request->getData());
            if ($this->BuildingsTypes->save($buildingsType)) {
                $this->Flash->success(__('The buildings type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The buildings type could not be saved. Please, try again.'));
        }
        $this->set(compact('buildingsType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Buildings Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $buildingsType = $this->BuildingsTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buildingsType = $this->BuildingsTypes->patchEntity($buildingsType, $this->request->getData());
            if ($this->BuildingsTypes->save($buildingsType)) {
                $this->Flash->success(__('The buildings type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The buildings type could not be saved. Please, try again.'));
        }
        $this->set(compact('buildingsType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Buildings Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buildingsType = $this->BuildingsTypes->get($id);
        if ($this->BuildingsTypes->delete($buildingsType)) {
            $this->Flash->success(__('The buildings type has been deleted.'));
        } else {
            $this->Flash->error(__('The buildings type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
