<?php
    //connecting to db
    $servername = "localhost";
    $username = "iDiscussHitesh";
    $password = "hitesh@700";
    $database = "idiscuss";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die("Sorry! Cannot connect to database right now");
    }

?>