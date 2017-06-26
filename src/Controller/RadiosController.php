<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 *
 * @method \App\Model\Entity\Contact[] paginate($object = null, array $settings = [])
 */
class RadiosController extends AppController
{

	public function configure() {

		$this->loadModel('Sections');

		$pointer = shell_exec('rigctl --list');
		$rows = explode("\n", $pointer);

		array_shift($rows);
		array_pop($rows);

		foreach($rows as $row) { 
			$radio = preg_split("/\s+/", $row, 8);
			array_shift($radio);
			$radios[$radio[0]] = $radio[1] . ' ' . $radio[2];
			//array_shift($radios);
		}
		asort($radios);
		$this->set(compact('radios'));

		
		if(file_exists(WWW_ROOT . '/radio.json')) { 
			$config = file_get_contents(WWW_ROOT . '/radio.json');
			$config = json_decode($config);
		}

		$currents['radio'] = !empty($config->radio) ? $config->radio : '';
		$currents['port_speed'] = !empty($config->port_speed) ? $config->port_speed : '';
		$currents['com_port'] = !empty($config->com_port) ? $config->com_port : '/dev/ttyUSB01';
		$currents['club_call'] = !empty($config->club_call) ? $config->club_call : '';
		$currents['class'] = !empty($config->class) ? $config->class : '';
		$currents['section'] = !empty($config->section) ? $config->section : '';
		$currents['station_name'] = !empty($config->station_name) ? $config->station_name : '';
		$currents['civ_address'] = !empty($config->civ_address) ? $config->civ_address : '';



		$sections = $this->Sections->find('list', ['limit' => 200]);

		$this->set(compact('currents', 'sections'));


		if($this->request->is('post')) {

			$data = $this->request->getData();
			if(empty($data['civ_address']))
					unset($data['civ_address']);

			$config = json_encode($data);

			if(file_put_contents(WWW_ROOT . '/radio.json', $config)) { 
				$this->Flash->success(__('The configuration has been saved.'));
				$this->redirect(['controller'=>'contacts']);
			} else { 
				$this->Flash->error(__('The configuration could not be saved. Please, try again.'));
			}

			

				// --model=
				// --serial-speed==
				// --civaddr=

		}


	}


	public function poll() { 
		$this->loadComponent('RequestHandler');
		$this->loadModel('Bands');
		$this->loadModel('Modes');

		try { 

	        if(file_exists(WWW_ROOT . '/radio.json')) { 
	            $config = file_get_contents(WWW_ROOT . '/radio.json');
	            $config = json_decode($config);

	            if(empty($config->radio)) { 
	            	throw new \Cake\Network\Exception\NotFoundException('No Radio Configured');
	            }

	            $command = 'rigctl ';
	            $command .= '--model=' . $config->radio;
	            $command .= ' --serial-speed=' . $config->port_speed;
	            
	            if(!empty($config->civ_address))
	                $command .= ' --civaddr=' . $config->civ_address;


	            $radio['frequency'] = exec($command . ' f') / 1000000;
	            $radio['band'] = $this->Bands->find('all', ['conditions'=>['frequency_start < ' . $radio['frequency'], 'frequency_end > ' . $radio['frequency']]])->toArray()[0]['id'];
	            $radio['mode_actual'] = explode("\n", shell_exec($command . ' m'))[0];
	            switch($radio['mode_actual']) { 
	            	case "FM": 
	            		$mode = "PHONE";
	            		break;
	            	case "AM": 
	            		$mode = "PHONE";
	            		break;
	            	case "USB":
	            		$mode = "PHONE";
	            		break;
	            	case "LSB": 
	            		$mode = "PHONE";
	            		break;
	            	case "CW":
	            		$mode = "CW";
	            		break;
	            	case "RTTY":
	            		$mode = "DIGITAL";
	            		break;
	            	default:
	            		$mode = "PHONE";
	            }
	            $radio['mode'] = $this->Modes->findByTitle($mode)->toArray()[0]['id'];
	            
	            if(!empty($radio['frequency']) && !empty($radio['mode_actual'])) { 
	            	$this->set('radio', $radio);
	            } else { 
	            	throw new \Exception('Could not read data from radio');
	            }

				$this->viewBuilder()->className('Json');
				$this->response->download('radio.json');
	            
	            $this->set('_serialize', ['radio']);

	                // --serial-speed==
	                // --civaddr=');

	        } else { 
	            // In your controller's action when saving failed
				throw new \Cake\Network\Exception\NotFoundException('No Config File Found');
	            
	        }
	    } catch (Exception $ex) {
	    		$this->set('errors', $ex->getMessage());
				$this->set('_jsonOptions', JSON_FORCE_OBJECT);
				$this->set('_serialize', ['errors']);
	    }
    }


} 
