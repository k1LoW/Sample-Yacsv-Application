<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    public $actsAs = array(
        'Yacsv.Importer',
    );

    public $validate = array(
        'title' => array(
            'notEmptyTitle' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false,
                'required' => true,
                'last' => true,
            ),
            'isUniqueTitle' => array(
                'rule' => array('isUnique'),
                'allowEmpty' => false,
                'required' => true,
                'last' => true,
            ),
        ),
        'body' => array(
            'notEmptyBody' => array(
                'rule' => array('notempty'),
                'allowEmpty' => false,
                'required' => true,
                'last' => true,
            ),
        ),
    );
}
