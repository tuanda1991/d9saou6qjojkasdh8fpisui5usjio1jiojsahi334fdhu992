<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property UserGroup $UserGroup
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'NOT_EMAIL',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'NOT_EMPTY',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'NOT_EMPTY',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'full_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'NOT_EMPTY',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gender' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'NOT_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_delete' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'NOT_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
//	public $belongsTo = array(
//		'UserGroup' => array(
//			'className' => 'UserGroup',
//			'foreignKey' => 'user_group_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
//	);
}
