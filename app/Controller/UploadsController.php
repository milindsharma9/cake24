<?php

class UploadsController extends AppController {

public $uses = array('Upload');

function beforeFilter(){
	//$this->Auth->logout();
		parent::beforeFilter();
		if (!$this->Auth->loggedIn()) {
		
		$this->redirect(array("controller"=>"users","action"=>"login"));
		
		}
}		

	