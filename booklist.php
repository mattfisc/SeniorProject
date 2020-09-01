<?php

// $url = 'http://localhost/booklist.php?search=book';
// echo $url;
// echo parse_url($url, search); # output "myqueryhash"

$book = $_GET['q'];
echo $book

//NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
// $mysqli = new mysqli("localhost","root","","booklisting");
// if ($mysqli->connect_errno) {
//   echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }

?>