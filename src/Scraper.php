<?php namespace kirtusj\newsapi;

/**
*  Scraper Class
*
*  This class is the main entry for collecting and sending information to and from the client.
*  Has the following methods:
*   get_top(query, sources, language, country, pageSize, page)
*   get_everything(query, sources, language, domains, excludeDomains, fromDate, toDate, sortBy, pageSize, page)
*   get_sources(category, country, language)
*
*  @author kirtusj
*/

use kirtusj\newsapi\Queries;

class Scraper {
  public function __construct($api_key) {
    $this->api_key = $api_key;
    $this->queries = new Queries();
  }
  public function get_top($args) {
    /**
    
    Collects arguments from an array and sends the arguments to Queries for validation.
    If the arguments are validated, they will be dispatched to the payload.
    The payload is sent to the function connect which will return a JSON object returned from newsapi.org

    Arguments:
    q - Sets the query arg sent to NewsApi
    sources - Sets the sources sent to NewsApi
    country - Sets the country sent to NewsApi
    pageSize - Sets the size of the pages sent to NewsApi
    page - Sets the amount of pages sent to NewsApi

    Dispatch:
    The Applicable arguments assigned to the payload will be dispatched with the connect() function, and validated with the API_KEY.

    **/
    $payload = [];
    if (isset($args['q'])) $payload = $this->queries->get_query($args['q'], $payload);
    if (isset($args['sources'])) $payload = $this->queries->get_sources($args['sources'], $payload);
    if (isset($args['language'])) $payload = $this->queries->get_language($args['language'], $payload);
    if (isset($args['country'])) $payload = $this->queries->get_country($args['country'], $payload);
    if (isset($args['pageSize'])) $payload = $this->queries->get_page_size($args['pageSize'], $payload);
    if (isset($args['page'])) $payload = $this->queries->get_page_count($args['page'], $payload);
    return $this->queries->connect($this->queries->constants->urls['top'], $payload, $this->api_key);
  }
  public function get_everything($args) {
    /**
    Collects arguments from an array and sends the arguments to Queries for validation.
    If the arguments are validated, they will be dispatched to the payload.
    The payload is sent to the function connect which will return a JSON object returned from newsapi.org

    Arguments:
    q - Sets the query arg sent to NewsApi
    sources - Sets the sources sent to NewsApi
    domains - Sets the domains sent to NewsApi
    excludeDomains - Sets the domains that will not be returned by NewsApi
    from - Sets the date which the NewsApi return will begin at
    to - Sets the date which the NewsApi return will end at
    sortBy - Sets the sort type sent to NewsApi
    pageSize - Sets the size of the pages sent to NewsApi
    page - Sets the amount of pages sent to NewsApi
    
    Dispatch:
    The Applicable arguments assigned to the payload will be dispatched with the connect() function, and validated with the API_KEY.
    **/
    $payload = [];
    if (isset($args['q'])) $payload = $this->queries->get_query($args['q'], $payload);
    if (isset($args['sources'])) $payload = $this->queries->get_sources($args['sources'], $payload);
    if (isset($args['language'])) $payload = $this->queries->get_language($args['language'], $payload);
    if (isset($args['domains'])) $payload = $this->queries->get_domains($args['domains'], $payload, "domain");
    if (isset($args['excludeDomains'])) $payload = $this->queries->get_domains($args['excludeDomains'], $payload, "excludeDomains");
    if (isset($args['from'])) $payload = $this->queries->get_date($args['from'], $payload, "from");
    if (isset($args['to'])) $payload = $this->queries->get_date($args['to'], $payload, "to");
    if (isset($args['sortBy'])) $payload = $this->queries->get_sort($args['sortBy'], $payload);
    if (isset($args['pageSize'])) $payload = $this->queries->get_page_size($args['pageSize'], $payload);
    if (isset($args['page'])) $payload = $this->queries->get_page_count($args['page'],$payload);
    return $this->queries->connect($this->queries->constants->urls['everything'], $payload, $this->api_key);
  }
  public function get_sources($args) {
    /**
    Collects arguments from an array and sends the arguments to Queries for validation.
    If the arguments are validated, they will be dispatched to the payload.
    The payload is sent to the function connect which will return a JSON object returned from newsapi.org
   
    Arguments:
    category - Sets the category sent to NewsApi
    country - Sets the country sent to NewsApi
    language - Sets the language sent to NewsApi
    
    Dispatch:
    The Applicable arguments assigned to the payload will be dispatched with the connect() function, and validated with the API_KEY.
    **/
    $payload = [];
    if (isset($args['category'])) $payload = $this->queries->get_category($args['category'], $payload);
    if (isset($args['country'])) $payload = $this->queries->get_country($args['country'], $payload);
    if (isset($args['language'])) $payload = $this->queries->get_language($args['language'], $payload);
    return $this->queries->connect($this->queries->constants->urls['sources'], $payload, $this->api_key);
  }
}
