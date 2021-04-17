<?php

namespace App\Controller;

use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use cake\Datasource\connectionManager;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
use Cake\ORM\Table;

class StateController extends AppController {

    public function initialize() {
        parent::initialize();
       
    }

    public function index() {
 	
		$AllStates = TableRegistry::get('state');
	         $api_url = $AllStates->find('all')
			 ->toArray();
		
		$this->set('state', $api_url);
		  
		  
		
        if ($this->request->is('post')) {
			$data =$this->request->getData();
			$type =$data['name'];
			
			$State = $this->State->newEntity();
            $State = $this->State->patchEntity($State,$data );

            if ($this->State->save($State)) {
                $this->Flash->success(__('State has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add State.'));
			
        }
        
    
       
            }
        
     public function dashboard() {
         $name = $this->request->session()->read('username');
      
    $getdata = TableRegistry::get('users')->find('all')->where(['username' =>$name])->toArray();
       
          
                   $this->set('getdata',$getdata); 
                  }

   
    public function logout() {
        $this->autoRender = false;
     // die();
        $session = $this->request->session();
        $session->delete('empid');
        $session->delete('company_id');
        $this->Auth->logout();
        $this->redirect(['action' => 'login']);
    }


         


    
}
