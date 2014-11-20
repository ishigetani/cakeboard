<?php
App::uses('AppModel', 'Model');
/**
 * Board Model
 *
 * @property User $User
 */
class Board extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'content' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '必須項目です',
            )
        ),
        'img_pass' => array(
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'すでにそのファイル名は保存されています',
                'allowEmpty' => true,
            )
        ),
        'img' => array(
            // ルール：uploadError => errorを検証 (2.2 以降)
            'upload-file' => array(
                'rule' => array( 'uploadError'),
                'message' => array( 'Error uploading file'),
                'last' => true,
            ),
            'extension' => array(
                //拡張子の指定
                'rule' => array('extension',array('jpg','jpeg','gif','png')),
                'message' => '画像ではありません。',
                'allowEmpty' => true,
            ),
            'size' => array(
                //画像サイズの制限
                'rule' => array('fileSize', '<=', '500000'),
                'message' => '画像サイズは500KB以下でお願いします',
                'allowEmpty' => true
            )
        )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
