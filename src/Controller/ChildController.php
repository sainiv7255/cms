<?php

namespace App\Controller;

use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use cake\Datasource\connectionManager;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;

class ChildController extends AppController {

    public function initialize() {
        parent::initialize();
       
    }

        public function index() {
 	
		$AllStates = TableRegistry::get('state');
	         $AllStates = $AllStates->find('all')
			 ->toArray();
		
		$this->set('state', $AllStates);
		$Allchild = TableRegistry::get('child');
	         $Allchild = $Allchild->find('all')
			 ->toArray();
	
		  $this->set('child', $Allchild);
		
        if ($this->request->is('post')) {
			$data =$this->request->getData();
			
			
			
			$Child = $this->Child->newEntity();
			
			$image=$data['image'];
			
			

			
	 if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$this->webroot."img/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   $data['image']=$file_name;
            $Child = $this->Child->patchEntity($Child,$data );

            if ($this->Child->save($Child)) {
                $this->Flash->success(__('Child has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add Child.'));
			
        }
	   }
        
     public function getdistrict() {
        $this->autoRender= false;

         if ($this->request->is('post')) {

			
			$state_id = $_POST['state_id']; 
            $state = TableRegistry::getTableLocator()->get('state');

$state = $state->find('all')->where(['name' =>$state_id])->toArray();

$district = TableRegistry::getTableLocator()->get('district');

$district = $district->find('all')->where(['state_id' =>$state[0]->id])->toArray();

          foreach($district as $row)
		  {
			$list.='<option  value="'.$row->name.'">'.$row->name.'</option>'; 
			  
		  }
                   echo $list;
			   exit;
		 }      

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
