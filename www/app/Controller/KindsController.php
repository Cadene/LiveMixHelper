<?php
App::uses('AppController', 'Controller');
/**
 * Kinds Controller
 *
 * @property Kind $Kind
 * @property PaginatorComponent $Paginator
 */
class KindsController extends AppController {

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
		$this->Kind->recursive = 0;
		$this->set('kinds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Kind->exists($id)) {
			throw new NotFoundException(__('Invalid kind'));
		}
		$options = array('conditions' => array('Kind.' . $this->Kind->primaryKey => $id));
		$this->set('kind', $this->Kind->find('first', $options));
		$musics = $this->requestAction('/musics/getMusicsByKind/'.$id);
		//debug($musics);
		$this->set('musics', $musics);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Kind->create();
			if ($this->Kind->save($this->request->data)) {
				$this->Session->setFlash(__('The kind has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kind could not be saved. Please, try again.'));
			}
		}
		$musics = $this->Kind->Music->find('list');
		$this->set(compact('musics'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Kind->exists($id)) {
			throw new NotFoundException(__('Invalid kind'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Kind->save($this->request->data)) {
				$this->Session->setFlash(__('The kind has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kind could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Kind.' . $this->Kind->primaryKey => $id));
			$this->request->data = $this->Kind->find('first', $options);
		}
		$musics = $this->Kind->Music->find('list');
		$this->set(compact('musics'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Kind->id = $id;
		if (!$this->Kind->exists()) {
			throw new NotFoundException(__('Invalid kind'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->Kind->delete()) {
			$this->Session->setFlash(__('The kind has been deleted.'));
		} else {
			$this->Session->setFlash(__('The kind could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Kind->recursive = 0;
		$this->set('kinds', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Kind->exists($id)) {
			throw new NotFoundException(__('Invalid kind'));
		}
		$options = array('conditions' => array('Kind.' . $this->Kind->primaryKey => $id));
		$this->set('kind', $this->Kind->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Kind->create();
			if ($this->Kind->save($this->request->data)) {
				$this->Session->setFlash(__('The kind has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kind could not be saved. Please, try again.'));
			}
		}
		$musics = $this->Kind->Music->find('list');
		$this->set(compact('musics'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Kind->exists($id)) {
			throw new NotFoundException(__('Invalid kind'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Kind->save($this->request->data)) {
				$this->Session->setFlash(__('The kind has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kind could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Kind.' . $this->Kind->primaryKey => $id));
			$this->request->data = $this->Kind->find('first', $options);
		}
		$musics = $this->Kind->Music->find('list');
		$this->set(compact('musics'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Kind->id = $id;
		if (!$this->Kind->exists()) {
			throw new NotFoundException(__('Invalid kind'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Kind->delete()) {
			$this->Session->setFlash(__('The kind has been deleted.'));
		} else {
			$this->Session->setFlash(__('The kind could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
