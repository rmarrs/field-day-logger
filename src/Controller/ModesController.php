<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modes Controller
 *
 * @property \App\Model\Table\ModesTable $Modes
 *
 * @method \App\Model\Entity\Mode[] paginate($object = null, array $settings = [])
 */
class ModesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $modes = $this->paginate($this->Modes);

        $this->set(compact('modes'));
        $this->set('_serialize', ['modes']);
    }

    /**
     * View method
     *
     * @param string|null $id Mode id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mode = $this->Modes->get($id, [
            'contain' => []
        ]);

        $this->set('mode', $mode);
        $this->set('_serialize', ['mode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mode = $this->Modes->newEntity();
        if ($this->request->is('post')) {
            $mode = $this->Modes->patchEntity($mode, $this->request->getData());
            if ($this->Modes->save($mode)) {
                $this->Flash->success(__('The mode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mode could not be saved. Please, try again.'));
        }
        $this->set(compact('mode'));
        $this->set('_serialize', ['mode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mode id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mode = $this->Modes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mode = $this->Modes->patchEntity($mode, $this->request->getData());
            if ($this->Modes->save($mode)) {
                $this->Flash->success(__('The mode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mode could not be saved. Please, try again.'));
        }
        $this->set(compact('mode'));
        $this->set('_serialize', ['mode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mode id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mode = $this->Modes->get($id);
        if ($this->Modes->delete($mode)) {
            $this->Flash->success(__('The mode has been deleted.'));
        } else {
            $this->Flash->error(__('The mode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
