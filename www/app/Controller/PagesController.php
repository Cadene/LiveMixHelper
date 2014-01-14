<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class PagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * Valid pages
 *
 * @var array
 */
	private $pages = array('home', 'contact');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->view = 'home';
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function display($name = null) {
		debug($name);
		if (is_null($name) || !in_array($name,$this->pages)) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->view = $name;
	}
}
