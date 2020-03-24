
<?php
$connection = mysqli_connect('localhost','root','','petdates');
    if (!$connection){
    echo "Cannot connect to MySQL".mysqli_connect_error();
    exit();
    }
?>