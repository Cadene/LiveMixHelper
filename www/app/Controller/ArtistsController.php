<?php
App::uses('AppController', 'Controller');
/**
 * Artists Controller
 *
 * @property Artist $Artist
 * @property PaginatorComponent $Paginator
 */
class ArtistsController extends AppController {

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
		$this->Artist->recursive = 2;
		$this->paginate = array('Artist' => array(
			'limit' => 20,
			'maxLimit' => 30
		));
		$artists = $this->paginate('Artist');
		foreach ($artists as $k=>$artist) {
			$kinds = array();
			foreach ($artist['Music'] as $music) {
				foreach ($music['Kind'] as $kind) {
					if(!in_array($kind['name'],$kinds)) {
						$kinds[] = $kind['name'];
						$tmp['id'] = $kind['id'];
						$tmp['name'] = $kind['name'];
						$artists_alias[$k][] = $tmp;
					}
				}
				//debug($kinds);
			}
		}
		if(isset($artists_alias)){
			foreach ($artists_alias as $k=>$v) {
				$artists[$k]['Kind'] = $v;
			}
		}
		//debug($artists_alias);
		$this->set('artists', $artists);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
		$this->set('artist', $this->Artist->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Artist->create();
			try  {
				if ($this->Artist->save($this->request->data)) {
					$this->Session->setFlash('Artiste ajouté avec succès.','notif',array('type'=>'success'));
					return $this->redirect(array('action' => 'index'));
				}
			}
			catch (PDOException $e) {
				$this->Session->setFlash('L\'ajout a échoué.','notif',array('type'=>'danger'));
				return $this->redirect(array('action' => 'index'));
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
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
			$this->request->data = $this->Artist->find('first', $options);
		}
		$musics = $this->Artist->Music->find('list');
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
		$this->Artist->id = $id;
		if (!$this->Artist->exists()) {
			throw new NotFoundException(__('Invalid artist'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->Artist->delete()) {
			$this->Session->setFlash(__('The artist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The artist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Artist->recursive = 0;
		$this->set('artists', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
		$this->set('artist', $this->Artist->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Artist->create();
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
			}
		}
		$musics = $this->Artist->Music->find('list');
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
		if (!$this->Artist->exists($id)) {
			throw new NotFoundException(__('Invalid artist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Artist->save($this->request->data)) {
				$this->Session->setFlash(__('The artist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
			$this->request->data = $this->Artist->find('first', $options);
		}
		$musics = $this->Artist->Music->find('list');
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
		$this->Artist->id = $id;
		if (!$this->Artist->exists()) {
			throw new NotFoundException(__('Invalid artist'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Artist->delete()) {
			$this->Session->setFlash(__('The artist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The artist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
