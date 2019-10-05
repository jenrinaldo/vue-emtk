<?php

// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpass = '12345678';
// $dbname = 'himatekkom';

$dbhost = 'https://db-hosting.ub.ac.id';
$dbuser = 'himatekkomub';
$dbpass = 'kutqquipwj';
$dbname = 'db_himatekkomub';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die ('Could connect to database');
?>