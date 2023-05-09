<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "miniproject_final";

    $conn = mysqli_connect($servername, $username ,$password , $database,'3307');

    if(!$conn) {
        die("error". mysqli_connect_error());
    }

?>