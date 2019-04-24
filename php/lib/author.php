<?php
//set up the require once for both autoload directories
//use the new keyword to call the constructor in the class and add all required parameters
//var_dump the result

require_once (dirname(__DIR__) . "/vendor/autoload.php");
require_once (dirname(__DIR__) . "/classes/autoload.php");

use jgallegos362\objectOriented\Author;

$authorId = new Author("b3d81ad8-0c17-4167-aa70-da7114c3c92a", "16d9afe8a5db490e81a989f9306501cd", "moreauthors.com", "author@author.com",
	'$argon2i$v=19$m=1024,t=384,p=2$T1B6Ymdqa3FJdmZqaDdqYg$hhyC1jf2WjbgfD8Jp6GZE9Tg3IpsYpXKm2VWYOJq8LA', "newAuthor");

var_dump($authorId);
