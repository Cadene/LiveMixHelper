<?php
App::uses('AppController', 'Controller');
/**
 * Musics Controller
 *
 * @property Music $Music
 * @property PaginatorComponent $Paginator
 */
class MusicsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');


/**
 * index method
 *
 * @return void
 */
	public function index()
	{
		$this->Music->recursive = 1;
		$this->paginate = array(
			'Music' => array(
				'limit' => 10,
				'maxLimit' => 50,
				'contain' => array(
					'KindsMusic' => array('Kind')
				)
			)
		);
		$musics = $this->paginate('Music');
		$this->set('musics', $musics);
	}

	public function getMusics($idArtist){
		$this->Music->recursive = 1;
		$this->Music->bindModel(array('hasOne'=>array('ArtistsMusic')),false);
		$this->paginate = array(
			'Music' => array(
				'limit' => 10,
				'maxLimit' => 50,
				'contain' => array(
					'ArtistsMusic' => array('Artist')
				),
				'conditions' => array('ArtistsMusic.artist_id' => $idArtist)
			)
		);
		return $this->paginate('Music');
	}

	public function getMusicsByKind($idKind){
		$this->Music->recursive = 1;
		$this->Music->bindModel(array('hasOne'=>array('KindsMusic')),false);
		$this->paginate = array(
			'Music' => array(
				'limit' => 10,
				'maxLimit' => 50,
				'contain' => array(
					'KindsMusic' => array('Kind')
				),
				'conditions' => array('KindsMusic.kind_id' => $idKind)
			)
		);
		return $this->paginate('Music');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Music->exists($id)) {
			throw new NotFoundException(__('Invalid music'));
		}
		$options = array('conditions' => array('Music.' . $this->Music->primaryKey => $id));
		$musics = $this->Music->find('first', $options);
		$this->set('music', $musics);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Music->create();
			//debug($this->request->data);
			if ($this->Music->save($this->request->data)) {
				$this->Session->setFlash(__('The music has been saved.'),'notif',array('type'=>'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The music could not be saved. Please, try again.'));
			}
		}
		$labels = $this->Music->Label->find('list');
		$albums = $this->Music->Album->find('list');
		$artists = $this->Music->Artist->find('list');
		$kinds = $this->Music->Kind->find('list');
		$sets = $this->Music->Set->find('list');
		$this->set(compact('labels', 'albums', 'artists', 'kinds', 'sets'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Music->exists($id)) {
			throw new NotFoundException(__('Invalid music'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Music->save($this->request->data)) {
				$this->Session->setFlash(__('The music has been saved.'),'notif',array('type'=>'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The music could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Music.' . $this->Music->primaryKey => $id));
			$this->request->data = $this->Music->find('first', $options);
		}
		$labels = $this->Music->Label->find('list');
		$albums = $this->Music->Album->find('list');
		$artists = $this->Music->Artist->find('list');
		$kinds = $this->Music->Kind->find('list');
		$sets = $this->Music->Set->find('list');
		$this->set(compact('labels', 'albums', 'artists', 'kinds', 'sets'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Music->id = $id;
		if (!$this->Music->exists()) {
			throw new NotFoundException(__('Invalid music'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->Music->delete()) {
			$this->Session->setFlash('The music has been deleted.','notif',array('type'=>'success'));
		} else {
			$this->Session->setFlash(__('The music could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Music->recursive = 0;
		$this->set('musics', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Music->exists($id)) {
			throw new NotFoundException(__('Invalid music'));
		}
		$options = array('conditions' => array('Music.' . $this->Music->primaryKey => $id));
		$this->set('music', $this->Music->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Music->create();
			if ($this->Music->save($this->request->data)) {
				$this->Session->setFlash(__('The music has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The music could not be saved. Please, try again.'));
			}
		}
		$labels = $this->Music->Label->find('list');
		$albums = $this->Music->Album->find('list');
		$artists = $this->Music->Artist->find('list');
		$kinds = $this->Music->Kind->find('list');
		$sets = $this->Music->Set->find('list');
		$this->set(compact('labels', 'albums', 'artists', 'kinds', 'sets'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Music->exists($id)) {
			throw new NotFoundException(__('Invalid music'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Music->save($this->request->data)) {
				$this->Session->setFlash(__('The music has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The music could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Music.' . $this->Music->primaryKey => $id));
			$this->request->data = $this->Music->find('first', $options);
		}
		$labels = $this->Music->Label->find('list');
		$albums = $this->Music->Album->find('list');
		$artists = $this->Music->Artist->find('list');
		$kinds = $this->Music->Kind->find('list');
		$sets = $this->Music->Set->find('list');
		$this->set(compact('labels', 'albums', 'artists', 'kinds', 'sets'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Music->id = $id;
		if (!$this->Music->exists()) {
			throw new NotFoundException(__('Invalid music'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Music->delete()) {
			$this->Session->setFlash(__('The music has been deleted.'));
		} else {
			$this->Session->setFlash(__('The music could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
