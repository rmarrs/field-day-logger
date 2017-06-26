<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bands Controller
 *
 * @property \App\Model\Table\BandsTable $Bands
 *
 * @method \App\Model\Entity\Band[] paginate($object = null, array $settings = [])
 */
class BandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $bands = $this->paginate($this->Bands);

        $this->set(compact('bands'));
        $this->set('_serialize', ['bands']);
    }

    /**
     * View method
     *
     * @param string|null $id Band id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $band = $this->Bands->get($id, [
            'contain' => []
        ]);

        $this->set('band', $band);
        $this->set('_serialize', ['band']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $band = $this->Bands->newEntity();
        if ($this->request->is('post')) {
            $band = $this->Bands->patchEntity($band, $this->request->getData());
            if ($this->Bands->save($band)) {
                $this->Flash->success(__('The band has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The band could not be saved. Please, try again.'));
        }
        $this->set(compact('band'));
        $this->set('_serialize', ['band']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Band id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $band = $this->Bands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $band = $this->Bands->patchEntity($band, $this->request->getData());
            if ($this->Bands->save($band)) {
                $this->Flash->success(__('The band has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The band could not be saved. Please, try again.'));
        }
        $this->set(compact('band'));
        $this->set('_serialize', ['band']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Band id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $band = $this->Bands->get($id);
        if ($this->Bands->delete($band)) {
            $this->Flash->success(__('The band has been deleted.'));
        } else {
            $this->Flash->error(__('The band could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
