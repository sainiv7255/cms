<?php

namespace App\Controller;

use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use cake\Datasource\connectionManager;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;

class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
       
    }

    public function login() {
        
        $host = $_SERVER['HTTP_HOST'];

        
        if ($this->request->is('post')) {
            //print_r($this->request->data);die();
            $requestData = $this->request->data;
            $username = $requestData['username'];
 
   
               $user = $this->Auth->identify($requestData);
			   

            if ($user) {
                
                // Clear old messages
                $this->request->session()->delete('Flash');

                
               
                
                $session = $this->request->session();
                
               

            
                $session->write('username', $user['username']);
                
              
				 
                $this->Auth->setUser($user);
                $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
             
                
             
            }
            
                    else
                    {
                       $this->Flash->error("Invalid username");
                    }
                  }
                  else
                  {  
                    $error = 'Invalid username or password'; 
                    $this->set("error",$error);  
                  }
       
            }
        
     public function dashboard() {
         $name = $this->request->session()->read('username');

    $getdata = TableRegistry::get('users')->find('all')->where(['username' =>$name])->toArray();
       
                   $this->set('getdata',$getdata); 
                  }

   
    public function logout() {
        $this->autoRender = false;
        $session = $this->request->session();
        $session->delete('username');
        $this->Auth->logout();
        $this->redirect(['action' => 'login']);
    }


         


    
}
