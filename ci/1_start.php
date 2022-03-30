#Important 

1. Please check in `php.ini` file for extension "intl" enabled or not. 
2. 


Controllers :
------------
app > Controllers > your Controllers 


Displays html : 
---------------
app > Views > your html 


Routes : 
-------
app > Config > Routes.php  

$routes->get('/posts/(:any)','Test')




List errors in template: 
------------------------
<?php \Config\Services::validation()->listErrors(); ?>