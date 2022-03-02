<?php
$servername = "192.168.88.99";
$username = "maria";
$password = "maria123";
$db = "db_lts";

/*$servername = "192.168.88.4";
$username = "root";
$password = "19K23O15P";
$db = "db_lts";*/

$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

?>