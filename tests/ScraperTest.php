<?php 
use PHPUnit\Framework\TestCase;

class ScraperTest extends TestCase {
  private $ScraperClass;

  public function setUp() {
    parent::setUp();
    $this->ScraperClass = new kirtusj\newsapi\Scraper($api_key=getenv('NEWSAPIKEY'));
  }
  public function tearDown() {
    $this->ScraperClass = null;
    parent::tearDown();
  }

  /** @test **/
  public function wrong_api_key() {
    $class = new kirtusj\newsapi\Scraper($api_key="wrong_api_key");
    $this->assertTrue(strpos($class->get_top(array('q' => 'truimp')), '"status":"error"') == true);
  }

  /** @test **/
  public function get_top() {
    $this->assertTrue(strpos($this->ScraperClass->get_top(array('q' => 'trump')), '"status":"ok"') == true);
    $this->expectException(InvalidArgumentException::class);
    $this->assertTrue(strpos($this->ScraperClass->get_top(array('page' => '1')), '"status":"ok"') == true);
  }
  /** @test **/
  public function get_everything() {
    $this->assertTrue(strpos($this->ScraperClass->get_everything(array('sources' => 'cnn')), '"status":"ok"') == true);
    $this->expectException(UnexpectedValueException::class);
    $this->assertTrue(strpos($this->ScraperClass->get_everything(array('sortBy' => 'idk')), '"status":"ok"') == true);
  }
  /** @test **/
  public function get_sources() {
    $this->assertTrue(strpos($this->ScraperClass->get_sources(array('category' => 'business')), '"status":"ok"') == true);
    $this->expectException(UnexpectedValueException::class);
    $this->assertTrue(strpos($this->ScraperClass->get_sources(array('category' => 'trump')), '"status":"ok"') == true);
  }
}
