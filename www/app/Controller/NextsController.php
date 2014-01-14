<?php
App::uses('AppController', 'Controller');
/**
 * Nexts Controller
 *
 * @property Next $Next
 * @property PaginatorComponent $Paginator
 */
class NextsController extends AppController {

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
		$this->Next->recursive = 0;
		$this->set('nexts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Next->exists($id)) {
			throw new NotFoundException(__('Invalid next'));
		}
		$options = array('conditions' => array('Next.' . $this->Next->primaryKey => $id));
		$this->set('next', $this->Next->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Next->create();
			if ($this->Next->save($this->request->data)) {
				$this->Session->setFlash(__('The next has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The next could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Next->exists($id)) {
			throw new NotFoundException(__('Invalid next'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Next->save($this->request->data)) {
				$this->Session->setFlash(__('The next has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The next could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Next.' . $this->Next->primaryKey => $id));
			$this->request->data = $this->Next->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Next->id = $id;
		if (!$this->Next->exists()) {
			throw new NotFoundException(__('Invalid next'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Next->delete()) {
			$this->Session->setFlash(__('The next has been deleted.'));
		} else {
			$this->Session->setFlash(__('The next could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Next->recursive = 0;
		$this->set('nexts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Next->exists($id)) {
			throw new NotFoundException(__('Invalid next'));
		}
		$options = array('conditions' => array('Next.' . $this->Next->primaryKey => $id));
		$this->set('next', $this->Next->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Next->create();
			if ($this->Next->save($this->request->data)) {
				$this->Session->setFlash(__('The next has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The next could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Next->exists($id)) {
			throw new NotFoundException(__('Invalid next'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Next->save($this->request->data)) {
				$this->Session->setFlash(__('The next has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The next could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Next.' . $this->Next->primaryKey => $id));
			$this->request->data = $this->Next->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Next->id = $id;
		if (!$this->Next->exists()) {
			throw new NotFoundException(__('Invalid next'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Next->delete()) {
			$this->Session->setFlash(__('The next has been deleted.'));
		} else {
			$this->Session->setFlash(__('The next could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
