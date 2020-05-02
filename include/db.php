<?php
    $server = 'localhost';
    $user = 'helen';
    $password = 'bfoK7IYHzHVn2jTJ';
    $db = 'php_course';

    $conn = mysqli_connect($server,$user,$password,$db);

    if(!$conn) {
        die("Connection Failed!: ".mysqli_connect_error());        
    }

?>