<?php
App::uses('AppModel', 'Model');
/**
 * Book Model
 *
 * @property Author $Author
 * @property Genre $Genre
 */
class Book extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'name' => array(
			'text' => array(
				'rule' => array('text'),
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'author_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'genre_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $actsAs = array('Linkable','Containable');
	public $belongsTo = array('Author','Genre');
}
