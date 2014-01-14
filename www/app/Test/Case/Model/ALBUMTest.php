<?php
App::uses('ALBUM', 'Model');

/**
 * ALBUM Test Case
 *
 */
class ALBUMTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.a_l_b_u_m'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ALBUM = ClassRegistry::init('ALBUM');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ALBUM);

		parent::tearDown();
	}

}
