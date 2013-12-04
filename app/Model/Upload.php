<?php 
App::uses("AppModel","Model");

class Upload extends AppModel{

public $name = "Upload"; 
///many files belong to a single user
public $belongsTo = array(
					"User"=>array(
							'className'=>'User',
							'foreignKey'=>"user_id"
							)
					);
					
public $validate = 	array(
					 	'title' =>	array(
										'rule1'=> array(
														'rule' => 'notEmpty',
														'message' => 'This field cannot be left blank',
														'last'=>true //If you want validation to continue in spite of a rule
																	 //	failing set key last to false for that rule
												  ),
												  
										'size' => array(
														'rule' => array('between', 8, 20),
														'message' => 'Title should be at least 8 chars long'
														)		  
									),
						'filename' => array(
									'notempty' => array(
											'rule' => array('notEmpty'),
											'message' => 'Please select a file'
											//'allowEmpty' => false,
											//'required' => false,//that you cannot save the model without the key
											//'last' => false, // Stop validation after this rule
											//'on' => 'create', // Limit validation to 'create' or 'update' operations
								  ),
						),
					);				
}