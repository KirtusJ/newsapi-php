# newsapi-scraper
A PHP Package for the [News API](https://newsapi.org/docs/)

# Endpoints

Endpoints return a JSON Object based on the input you give them

## query_top

	"top" : "https://newsapi.org/v2/top-headlines"

### options

query, sources, language, country, pageSize, page
  
## query_everything

    "everything" : "https://newsapi.org/v2/everything"

### options

query, sources, language, domains, excludeDomains, from, to, sort, pageSize, page
 
## query_sources:

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

      "query" : str
      "sources" : str
      "language" : str
      "country" : str
      "pageSize" : int
      "page" : int
      "domains" : str
      "date" : str
      "sortBy" : str
      "category" : str
 
