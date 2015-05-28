Search Queries
==============

Description
------------
Search Query is a web service that search for a term and print a list of links as a result of search in different format.

Installation
------------

### Download the folder and copy it into:

    /var/www/

To run
------------

### View the site:

Visit http://localhost/task/index.php/search/?format=json&num=10&q=yakobabada

### Parameters

q => (query) a search term <br />
format => [json - xml] default -> xml <br />
num => number of result [from 1 to 10] default -> 10 <br />

System Explanation
------------------

###Framework :

codeigniter

###scraping html with php

Search Queries searches for the desired links by scraping html from google search pages.

Summary
-------
1- The user searches a term using url request. <br />
2- The application makes a request to the google . <br />
3- Google replies with html. <br />
4- The application scrapes html and get list of links. <br />
4- the Application creates a response with the desired results in Json or xml format. <br />
 


