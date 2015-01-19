<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::import('Vendor', 'Ubench');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * @var $bench ベンチマーク用
     */
    public $bench;

    public $components = array('Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'User',
                    'fields' => array('username' => 'login_name','password' => 'password')
                )
            ),
            //ログイン後の移動先
            'loginRedirect' => array('controller' => 'boards', 'action' => 'index'),
            //ログアウト後の移動先
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            //ログインページのパス
            'loginAction' => array('controller' => 'users', 'action' => 'login'),
        ));

    public function __construct(CakeRequest $request = null, CakeResponse $response = null) {
        $this->bench = new Ubench();

        // ベンチマーク開始
        $this->bench->start();

        parent::__construct($request, $response);
    }

    public function afterFilter() {
        // ベンチマーク終了
        $this->bench->end();

        debug($this->bench->getMemoryUsage());
        debug($this->bench->getMemoryPeak());
    }
}
