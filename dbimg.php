<?php 
session_start();

$postID = $_GET['id'];

$connection = mysqli_connect('localhost','phpmyadmin','Password1!','database');
if (!$connection){
echo "Cannot connect to MySQL".mysqli_connect_error();
exit();
}

$query = "SELECT picture FROM post WHERE post_id = '$postID'";

$result = mysqli_query($connection, $query);

$img = mysqli_fetch_assoc($result);

header("Content-type: image/jpg");

echo $img['picture'];
exit;
?>