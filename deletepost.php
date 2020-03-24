<?php 
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$postID = $_GET['id'];

include('connection.php');


$query = "DELETE FROM post WHERE post_id = '$postID'";

$result = mysqli_query($connection, $query);

header('location: search.php');
?>