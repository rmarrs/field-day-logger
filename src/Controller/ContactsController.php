<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Number;
/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 *
 * @method \App\Model\Entity\Contact[] paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{


    public function beforeFilter(\Cake\Event\Event $event) { 
        parent::beforeFilter($event);

        
    }





    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $contact = $this->Contacts->newEntity();

        if($this->request->is('post')) { 
            
            $data = $this->request->getData();

            if(!empty($data['operator_callsign']))
                 $this->request->session()->write('operator_callsign', $data['operator_callsign']);

                            
                $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
                
                if ($this->Contacts->save($contact)) {
                    $this->Flash->success(__('The contact has been saved.'));
                    

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The contact could not be saved. Please, try again.'));

        }





        $operator_callsign =  $this->request->session()->read('operator_callsign');

         if(file_exists(WWW_ROOT . '/radio.json')) { 
            $config = file_get_contents(WWW_ROOT . '/radio.json');
            $config = json_decode($config);
        }

        $station_name =  $config->station_name;

        empty($operator_callsign) ? '' : $operator_callsign;
        empty($station_name) ? '' : $station_name;

        if(!empty($config->radio)) { 
            $this->set('radio_configured', true);
        } else { 
            $this->set('radio_configured', false);
        }

        $this->set(compact('operator_callsign', 'station_name'));
        $contactstotal = $this->Contacts->find('all');
        $contactstotal = $contactstotal->count();
        
        $this->set(compact('contactstotal'));

        $this->paginate = [
            'contain' => ['Sections', 'Bands', 'Modes'],
            'limit' => 50,
            'order' => ['created DESC']
        ];

        $contacts = $this->paginate($this->Contacts);

        $sections_worked = $this->Contacts->Sections->find('all');
        $sections_worked->select(['count' => $sections_worked->func()->count('Contacts.id'),
                                'abbr' => 'abbr', 'description'=>'description', 'area'=>'area'])
        ->leftJoinWith('Contacts')
        ->where(['abbr <>' => 'DX'])
        ->group('abbr')
        ->order('area ASC, abbr ASC');
                                

        $sections = $this->Contacts->Sections->find('list', ['limit' => 200]);
        $bands = $this->Contacts->Bands->find('list', ['limit' => 200]);
        $modes = $this->Contacts->Modes->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'contacts', 'sections', 'bands', 'modes', 'station_name', 'sections_worked'));
        $this->set('_serialize', ['contact']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $sections = $this->Contacts->Sections->find('list', ['limit' => 200]);
        $bands = $this->Contacts->Bands->find('list', ['limit' => 200]);
        $modes = $this->Contacts->Modes->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'sections', 'bands', 'modes'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function dupeCheck($callsign, $band_id, $mode_id) { 
        $this->loadComponent('RequestHandler');
        $this->loadModel('Bands');
        $this->loadModel('Modes');

        
        $dupes = $this->Contacts->find('all', ['conditions'=>['callsign'=>$callsign, 'bands_id'=>$band_id, 'modes_id'=>$mode_id]]);

        if(count($dupes->toArray()) > 0) { 
            $duplicate =  true; 
        } else { 
            $duplicate = false;
        }

            

        $this->viewBuilder()->className('Json');
        $this->response->download('duplicate.json');
        $this->set('duplicate', $duplicate);
        $this->set('_serialize', ['duplicate']);

                // --serial-speed==
                // --civaddr=');
    }
}
