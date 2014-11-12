<?php
App::uses('AppController', 'Controller');
/**
 * Boards Controller
 *
 * @property Board $Board
 * @property PaginatorComponent $Paginator
 */
class BoardsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Board->recursive = 0;
		$this->set('boards', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Board->exists($id)) {
			throw new NotFoundException(__('Invalid board'));
		}
		$options = array('conditions' => array('Board.' . $this->Board->primaryKey => $id));
		$this->set('board', $this->Board->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Board->create();
			if ($this->Board->save($this->request->data)) {
				$this->Session->setFlash(__('The board has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The board could not be saved. Please, try again.'));
			}
		}
		$users = $this->Board->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Board->exists($id)) {
			throw new NotFoundException(__('Invalid board'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Board->save($this->request->data)) {
				$this->Session->setFlash(__('The board has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The board could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Board.' . $this->Board->primaryKey => $id));
			$this->request->data = $this->Board->find('first', $options);
		}
		$users = $this->Board->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Board->id = $id;
		if (!$this->Board->exists()) {
			throw new NotFoundException(__('Invalid board'));
		}
		if ($this->Board->delete()) {
			$this->Session->setFlash(__('The board has been deleted.'));
		} else {
			$this->Session->setFlash(__('The board could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
