Search Qeuries
==============

Installation
------------

### Download the folder and copy it into:

    /var/www/

### View the site:

Visit http://localhost/task/index.php/search/?format=json&num=10&q=yakobabada

### Parameters

q => (query) a search term
format => [json - xml] default -> xml
num => number of result [from 1 to 10] default -> 10


System Explanation
------------------

#Framework :codeigniter --> Reason of usage: Application is small scale project.

#scraping html with php
the application searches for the desired links by scraping html from google search pages.



#libraries:
-Format library: it conversts the php array into json or xml format.
-Search_term library: makes google request and scraping html response to php array. 

Summary
-------
1- The user searches a term using url request.
2- The application makes a request to the google .
3- Google replies with html.
4- The application scrapes html and get list of links.
4- the Application creates a response with the desired results in Json or xml format.
 


