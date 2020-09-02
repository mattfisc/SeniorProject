<?php

// $url = 'http://localhost/booklist.php?search=book';
// echo $url;
// echo parse_url($url, search); # output "myqueryhash"

$book = $_GET['q'];


//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


// STRING TEST
$test = "SELECT * FROM `booklisting` WHERE title = '$book' ";


//  PERFORM QUERY
if ($result = mysqli_query($conn, $test)) {

    // // ROW NUMBER
    // $num_results = mysqli_num_rows($result);

    // FOUND TRUE
    if(mysqli_num_rows($result) > 0){

        // tester
        $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
        echo json_encode($age);

    }else{// FALSE

    }

    // FREES MEMORY
    mysqli_free_result($result);
  }
  
mysqli_close($conn);


?>