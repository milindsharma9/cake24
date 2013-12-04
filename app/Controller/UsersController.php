<?php
class UsersController extends AppController {

	public $name = 'Users';  //name of the model file
	public $uses = array('User','Upload');
	
	function beforeFilter(){
	//$this->Auth->logout();
		parent::beforeFilter();
		//var_dump($this->Auth);die;
		if (!$this->Auth->loggedIn()) {
			
			$this->Auth->allow(array('login', 'register'));
		}
		else{
		
			if($this->params['action'] == 'login' || $this->params['action'] == 'register'){
				
				$this->redirect(array("controller"=>"users","action"=>"dashboard"));
			
			
			}
			
		
		}
		
		

	}
	
	public function login(){
		
		if($this->request->is('post')){
		
		
		$conditions  = array("User.username"=>$this->data['User']['username'], "User.password"=> $this->data['User']['password']);
			
			$dta = $this->User->find('first',array('conditions'=>$conditions));
			
			if(is_array($dta) && isset($dta['User']['id']) && $dta['User']['id']!=''){
			
				$arr = array('id'=>$dta['User']['id'], 'username'=>$dta['User']['username']);	
				if ($this->Auth->login($arr)) {
				
				
				$this->redirect(($this->Auth->redirectUrl()));
				}
				
			}	else {
				
						 $this->Session->setFlash('Invalid username or password, try again');
						 
					
					
			}		
		}
		
	}	
	
	public function register(){
	
	}
	
	public function dashboard(){
	
	}
	protected function processfile(){
	
		$file = $this->data['Upload']['filename'];
		//print_r($file);die;
		//print_r($this->data);die;
		 if ($file['error'] === UPLOAD_ERR_OK) {
				$filename  = $file['name'];
				$extension =  substr(strrchr($filename, '.'), 1);
				$flname = String::uuid();
				if (move_uploaded_file($file['tmp_name'], WWW_ROOT.'uploads'.DS.$flname.".". $extension)) {
					
					$this->request->data["Upload"]["user_id"] = $this->Auth->user("id");
					
					$this->request->data['Upload']['filename'] = $flname. $extension;
					return true;
				}
		 }
		 return false;
		
	}
	public function uploadfiles(){
		///function to upload files
		if($this->request->isPost()){
			//die("kkk");
			if($this->processfile()){
				$this->Upload->save($this->data);
				
			}
		}
	}
	
	public function logout(){
	
		return $this->redirect($this->Auth->logout());
	}
}