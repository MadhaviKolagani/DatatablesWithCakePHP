<?php

App::uses('AppModel', 'Model');

/**
 * Genre Model
 *
 * @property Book $Book
 */
class Genre extends AppModel {

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
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Book' => array(
            'className' => 'Book',
            'foreignKey' => 'genre_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
