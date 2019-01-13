<?php 
use PHPUnit\Framework\TestCase;

class ConstantsTest extends TestCase {
  public function testIsThereAnySyntaxError() {
	   $var = new kirtusj\newsapi\Constants(null, null, null, null, null);
	   $this->assertTrue(is_object($var));
	   unset($var);
  }
}
