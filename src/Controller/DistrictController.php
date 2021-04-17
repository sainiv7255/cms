<?php

namespace App\Controller;

use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use cake\Datasource\connectionManager;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
use Cake\ORM\Table;

class DistrictController extends AppController {

    public function initialize() {
        parent::initialize();
       
    }

       public function index() {
 	
		$AllStates = TableRegistry::get('state');
	         $AllStates = $AllStates->find('all')
			 ->toArray();
		$Alldistrict = TableRegistry::get('district');
			 $Alldistrict = $Alldistrict->find()
            ->select($Alldistrict)
            ->select(['a.name'])
            ->join([
              'a' => [
                    'table' => 'state',
                    'type' => 'LEFT',
                    'conditions' => 'state_id = a.id',
                ],
               
            ])->toArray();
		$this->set('state', $AllStates);
		 $this->set('district', $Alldistrict); 
		  
		
        if ($this->request->is('post')) {
			$data =$this->request->getData();
			$District = $this->District->newEntity();
            $District = $this->District->patchEntity($District,$data );

            if ($this->District->save($District)) {
                $this->Flash->success(__('District has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add District.'));
			
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
