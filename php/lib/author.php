<?php include("Author.php");

//use object oriented php website for beginners for help
$steven = new \edu\jgallegos362\objectOriented\author();
$jimmy = new \edu\jgallegos362\objectOriented\author();

$steven->set_name("Steven Boop");
$jimmy->set_name("Jimmy Neutron");

echo "Steven's full name: " . $steven->getAuthorId();
echo "Jimmy's full name: " . $jimmy->getAuthorId();