<?php namespace kirtusj\newsapi;

/**
*  Queries Class
*
*  This class is used to collection information from Scraper Class
*  That information will be validated through the Constants Class
*  And dispatched back to the payload
*
*  @author kirtusj
*/

use kirtusj\newsapi\Constants;

class Queries {
  public function __construct() {
    include 'setup.php';
    $this->constants = new Constants($urls, $countries, $languages, $categories, $sort_methods);
  }
  function connect($url, $payload, $key) {
    $curl = curl_init($url.http_build_query($payload));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Authorization: ' . $key
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
  }
  public function get_query($query, $payload) {
    if (is_string($query)) {
      $payload['q'] = $query;
      return $payload;
    } else {
      throw new InvalidArgumentException("Query must be type: string");
    }
  }
  public function get_sources($sources, $payload) {
    if (is_string($sources)) {
      $payload['sources'] = $sources;
      return $payload;
    } else {
      throw new InvalidArgumentException("Sources must be type: string");
    }
  }
  public function get_language($language, $payload) {
    if (is_string($language)) {
      if (in_array($language, $this->constants->get_languages())) {
        $payload['language'] = $language;
        return $payload;
      } else {
        throw new UnexpectedValueException("Language: ".$language." not found");
      }
    } else {
      throw new InvalidArgumentException("Language must be type: string");
    }
  }
  public function get_country($country, $payload) {
    if (is_string($country)) {
      if (in_array($country, $this->constants->get_countries())) {
        $payload['country'] = $country;
        return $payload;
      } else {
        throw new UnexpectedValueException("Country: ".$country." not found");
      }
    } else {
      throw new InvalidArgumentException("Country must be type: string");
    }
  }
  public function get_page_size($pageSize, $payload) {
    if (is_int($pageSize)) {
      $payload['pageSize'] = $pageSize;
      return $payload;
    } else {
      throw new InvalidArgumentException("pageSize must be type: int");
    }
  }
  public function get_page_count($page, $payload) {
    if (is_int($page)) {
      $payload['page'] = $page;
      return $payload;
    } else {
      throw new InvalidArgumentException("page must be type: int");
    }
  }
  public function get_domains($domain, $payload, $verse) {
    if (is_string($domain)) {
      $payload[$verse] = $domain;
      return $payload;
    } else {
      throw new InvalidArgumentException("Domain must be type: string");
    }
  }
  public function get_date($date, $payload, $verse) {
    if (is_string($date)) {
      if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
        $payload[$verse] = $date;
        return $payload;
      } else {
        throw new InvalidArgumentException("Date must be ISO 8601 Format");
      }
    } else {
      throw new InvalidArgumentException("Date must be type: string");
    }
  }
  public function get_sort($sort, $payload) {
    if (is_string($sort)) {
      if (in_array($sort, $this->constants->get_sort_methods())) {
        $payload['sortBy'] = $sort;
        return $payload;
      } else {
        throw new UnexpectedValueException("Sort type: ".$sort." not found");
      }
    } else {
      throw new InvalidArgumentException("Sort must be type: string");
    }
  }
  public function get_category($category, $payload) {
    if (is_string($category)) {
      if (in_array($category, $this->constants->get_categories())) {
        $payload['category'] = $category;
        return $payload;
      } else {
        throw new UnexpectedValueException("Category: ".$category." not found");
      }
    } else {
      throw new InvalidArgumentException("Category must be type: string");
    }
  }
}