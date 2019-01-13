<?php 
use PHPUnit\Framework\TestCase;

class QueriesTest extends TestCase {
  private $QueriesClass;

  public function setUp() {
    parent::setUp();
    $this->QueriesClass = new kirtusj\newsapi\Queries;
  }
  public function tearDown() {
    $this->QueriesClass = null;
    parent::tearDown();
  }
  /** @test **/
  public function get_query() {
  	$query = array('q1' => 'trump', 'q2' => 1);
  	$payload = [];
  	$this->assertInternalType('array', $this->QueriesClass->get_query($query['q1'], $payload));
  	$this->expectException(InvalidArgumentException::class);
  	$this->assertInternalType('array', $this->QueriesClass->get_query($query['q2'], $payload));
  }
  /** @test **/
  public function get_date() {
  	$query = array('date1' => '2018-02-21', 'date2' => '21-02-2018', 'date3' => 2018);
  	$payload = [];
  	$this->assertInternalType('array', $this->QueriesClass->get_date($query['date1'], $payload, 'from'));
  	$this->expectException(InvalidArgumentException::class);
  	$this->assertInternalType('array', $this->QueriesClass->get_date($query['date2'], $payload, 'from'));
  	$this->assertInternalType('array', $this->QueriesClass->get_date($query['date3'], $payload, 'from'));
  }
  /** @test **/
  public function get_category() {
  	$query = array('cat1' => 'business', 'cat2' => 'obama');
  	$payload = [];
  	$this->assertInternalType('array', $this->QueriesClass->get_category($query['cat1'], $payload));
  	$this->expectException(UnexpectedValueException::class);
  	$this->assertInternalType('array', $this->QueriesClass->get_category($query['cat2'], $payload));
  }
}
