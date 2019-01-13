<?php 
use PHPUnit\Framework\TestCase;

class QueriesTest extends TestCase {
  public function testIsThereAnySyntaxError() {
	   $var = new kirtusj\newsapi\Queries;
	   $this->assertTrue(is_object($var));
	   unset($var);
  }
}
