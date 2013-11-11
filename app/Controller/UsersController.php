<?php
class UsersController extends AppController {

	public $name = 'Users';  //name of the model file
	public $uses = array('User');
	
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
	
	public function logout(){
	
		return $this->redirect($this->Auth->logout());
	}
}