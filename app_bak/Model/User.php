<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Board $Board
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $name = 'User';
    public $validate = array(
        'login_name' => array(
            'alphanumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'allowEmpty' => false,
                'message' => '���[�U���̓A���t�@�x�b�g�Ɛ����œ�͂��ĉ�����'
            ),
            'between' => array(
                'rule' => array('between',3,20),
                'message' => '���[�U����3�����ȏ�A20�����ȉ��œ�͂��ĉ�����'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => '���̃��[�U���͊�Ɏg�p����Ă��܂�'
            )
        ),
        'password' => array(
            'alphanumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'allowEmpty' => false,
                'message' => '�p�X���[�h�̓A���t�@�x�b�g�Ɛ����œ�͂��ĉ�����',
                'on' => 'create'
            ),
            'between' => array(
                'rule' => array('between',3,20),
                'message' => '�p�X���[�h��3�����ȏ�A20�����ȉ��œ�͂��ĉ�����',
                'on' => 'create'
            )
        )
    );
 
    //���[�U���ƃp�X���[�h���o�^�ς݂��m�F
    public function check($data) {
        $n = $this->find('count', array(
                'conditions' => array(
                        'User.user_name' => $data['User']['user_name'],
                        'User.password' => $data['User']['password']
                )
        ));
        return $n > 0 ? true : false;
    }

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Board' => array(
			'className' => 'Board',
			'foreignKey' => 'user_id',
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
	
	public function beforeSave($option = array()){
		if(!empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
