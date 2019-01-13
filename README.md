# newsapi-scraper
A PHP Package for the [NewsAPI](https://newsapi.org/docs/) utility

# Installation

	composer require kirtusj/newsapi

# Usage

	require __DIR__.'/vendor/autoload.php';
	use kirtusj\newsapi\Scraper;
	$newsapi = new Scraper($api_key="your_api_key_here");

### everything

	$all_articles = $newsapi->get_everything(array(
							'q' => 'bitcoin', 
							'sources' => 'bbc-news,the-verge',
							'domains' => 'bbc.co.uk,techcrunch.com',
							'language' => 'en',
							'sortBy' => 'relevancy',
							'page' => 2));
		
### top

	$top_articles = $newsapi->get_top(array(
						'q' => 'bitcoin',
						'sources' => 'bbc-news, the-verge',
						'category' => 'business',
						'language' => 'en',
						'country' => 'us'));
			
### sources

	$sources = $newsapi->get_sources(array());
	
The information held in these variables can be used however you like.

# Example

### input

	$query = "Canada";
	$page = 1;
	$pageSize = 3;
	$language = 'en';

	$top_articles = $newsapi->get_top(array('q' => $query, 'page' => $page, 'pageSize' => $pageSize, 'language' => $language));

	echo $top_articles;
	
### output

	{"status":"ok","totalResults":30,"articles":[{"source":{"id":"nhl-news","name":"NHL 	News"},"author":null,"title":"'Hockey Night in Canada': 5 Storylines","description":"The Boston Bruins and Toronto Maple Leafs will play for the fourth and final time during the regular season at Scotiabank Arena as part of a \"Hockey Night in Canada\" doubleheader on Saturday (7 p.m. ET; NHLN, CBC, SN1, CITY, NESN, NHL.TV). The home team has w…","url":"https://www.nhl.com/news/hockey-night-in-canada-5-storylines-january-12/c-303810292","urlToImage":"https://nhl.bamcontent.com/images/photos/303810922/1024x576/cut.jpg","publishedAt":"2019-01-13T00:56:28.3635098Z","content":"The Boston Bruins and Toronto Maple Leafs will play for the fourth and final time during the regular season at Scotiabank Arena as part of a \"Hockey Night in Canada\" doubleheader on Saturday (7 p.m. ET; NHLN, CBC, SN1, CITY, NESN, NHL.TV). The home team has w… [+4309 chars]"}]}

# Endpoints

Endpoints return a JSON Object based on the input you give them

## get_top

	"top" : "https://newsapi.org/v2/top-headlines"

### options

q, sources, language, country, pageSize, page
  
## get_everything

    "everything" : "https://newsapi.org/v2/everything"

### options

q, sources, language, domains, excludeDomains, from, to, sort, pageSize, page
 
## get_sources:

	 "sources" : "https://newsapi.org/v2/sources"
   
### options

category, country, language
   
# Input
  
### countries:

      'ae','ar','at','au','be','bg','br','ca','ch','cn','co','cu','cz','de','eg','fr','gb','gr','hk',
      'hu','id','ie','il','in','it','jp','kr','lt','lv','ma','mx','my','ng','nl','no','nz','ph','pl',
      'pt','ro','rs','ru','sa','se','sg','si','sk','th','tr','tw','ua','us','ve','za'
             
### languages:
           
      'ar','en','cn','de','es','fr','he','it','nl','no','pt','ru','sv','ud'
      
### categories:

    'business', 'entertainment', 'general', 'health', 'science', 'sports', 'technology'}

### sortBy :
  
    'relevancy','popularity','publishedAt'

### to and from :

[from] date and [to] date
Must be structured in YYYY-MM-DD format

### Input types

      "q" : string
      "sources" : string
      "language" : string
      "country" : string
      "pageSize" : int
      "page" : int
      "domains" : string
      "date" : string
      "sortBy" : string
      "category" : str
 
