<?php
App::uses('AppController', 'Controller');
/**
 * Sets Controller
 *
 * @property Set $Set
 * @property PaginatorComponent $Paginator
 */
class SetsController extends AppController {

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
		$this->Set->recursive = 0;
		$this->set('sets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Set->exists($id)) {
			throw new NotFoundException(__('Invalid set'));
		}
		$options = array('conditions' => array('Set.' . $this->Set->primaryKey => $id));
		$this->set('set', $this->Set->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Set->create();
			if ($this->Set->save($this->request->data)) {
				$this->Session->setFlash(__('The set has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The set could not be saved. Please, try again.'));
			}
		}
		$users = $this->Set->User->find('list');
		$musics = $this->Set->Music->find('list');
		$this->set(compact('users', 'musics'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Set->exists($id)) {
			throw new NotFoundException(__('Invalid set'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Set->save($this->request->data)) {
				$this->Session->setFlash(__('The set has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The set could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Set.' . $this->Set->primaryKey => $id));
			$this->request->data = $this->Set->find('first', $options);
		}
		$users = $this->Set->User->find('list');
		$musics = $this->Set->Music->find('list');
		$this->set(compact('users', 'musics'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Set->id = $id;
		if (!$this->Set->exists()) {
			throw new NotFoundException(__('Invalid set'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Set->delete()) {
			$this->Session->setFlash(__('The set has been deleted.'));
		} else {
			$this->Session->setFlash(__('The set could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Set->recursive = 0;
		$this->set('sets', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Set->exists($id)) {
			throw new NotFoundException(__('Invalid set'));
		}
		$options = array('conditions' => array('Set.' . $this->Set->primaryKey => $id));
		$this->set('set', $this->Set->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Set->create();
			if ($this->Set->save($this->request->data)) {
				$this->Session->setFlash(__('The set has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The set could not be saved. Please, try again.'));
			}
		}
		$users = $this->Set->User->find('list');
		$musics = $this->Set->Music->find('list');
		$this->set(compact('users', 'musics'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Set->exists($id)) {
			throw new NotFoundException(__('Invalid set'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Set->save($this->request->data)) {
				$this->Session->setFlash(__('The set has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The set could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Set.' . $this->Set->primaryKey => $id));
			$this->request->data = $this->Set->find('first', $options);
		}
		$users = $this->Set->User->find('list');
		$musics = $this->Set->Music->find('list');
		$this->set(compact('users', 'musics'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Set->id = $id;
		if (!$this->Set->exists()) {
			throw new NotFoundException(__('Invalid set'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Set->delete()) {
			$this->Session->setFlash(__('The set has been deleted.'));
		} else {
			$this->Session->setFlash(__('The set could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
