<?php
App::uses('Board', 'Model');

/**
 * Board Test Case
 *
 */
class BoardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.board',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Board = ClassRegistry::init('Board');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Board);

		parent::tearDown();
	}

}
