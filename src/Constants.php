<?php namespace kirtusj\newsapi;

/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author yourname
*/

class Constants {
  public function __construct($urls, $countries, $languages, $categories, $sort_methods) {
    $this->urls = $urls;
    $this->countries = $countries;
    $this->languages = $languages;
    $this->categories = $categories;
    $this->sort_methods = $sort_methods;
  }
  public function get_countries() {
    return $this->countries;
  }
  public function get_languages() {
    return $this->languages;
  }
  public function get_categories() {
    return $this->categories;
  }
  public function get_sort_methods() {
    return $this->sort_methods;
  }
}