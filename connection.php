
<?php
$connection = mysqli_connect('localhost','phpmyadmin','Password1!','database');
    if (!$connection){
    echo "Cannot connect to MySQL".mysqli_connect_error();
    exit();
    }
?>