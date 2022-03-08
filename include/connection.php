<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_hospital';
$conn = mysql_connect($host,$user,$pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);

// if ($dbselect == true) {
//     echo "Connection Success!";
// } else {
//     echo "Connection Failed!";
// }