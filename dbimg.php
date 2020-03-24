<?php 
session_start();

$postID = $_GET['id'];

include('connection.php');


$query = "SELECT picture FROM post WHERE post_id = '$postID'";

$result = mysqli_query($connection, $query);

$img = mysqli_fetch_assoc($result);

header("Content-type: image/jpg");

echo $img['picture'];
?>