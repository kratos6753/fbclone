<?php
use PHPUnit\Framework\TestCase;
require_once dirname(dirname(dirname(__DIR__))).'/api/classes/DB.class.php';

class DBTest extends TestCase {
	protected $dbcon;
	
	public function setUp() {
		$this->dbcon = new DB();
	}

	public static function getMethod($name) {
		$class = new ReflectionClass('DB');
		$method = $class->getMethod($name);
		$method->setAccessible(true);
		return $method;
	}

	public function test_connection() {
		$connect = self::getMethod('connect');
		$connection = $connect->invokeArgs($this->dbcon, array());
		$this->assertEmpty($this->dbcon->getErrors());
		$this->assertInstanceOf(mysqli::class, $connection);
	}
}