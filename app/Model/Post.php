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

    // POSTされているCSVファイルのフィールド名
    public $importFilterArgs = array(
        array('name' => 'csvfile'), // $data['Post']['csvfile']でPOSTされてくる
    );

    // 何列目がどのフィールドか
    public $importFields = array(
        'title', // 1列目はPost.title
        'body', // 2列目はPost.body
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

    /**
     * saveWithTimestamp
     *
     * @param $data
     */
    public function saveWithTimestamp($data){
        if (!empty($data['Post']['title'])) {
            $data['Post']['title'] = $data['Post']['title'] . date(' [Y-m-d]');
        }
        $this->create();
        return $this->save($data);
    }
}
