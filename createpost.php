<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

include('connection.php');


$petName = $_POST['PetName'];
$petType = $_POST['PetType'];
$petDesc = $_POST['PetDescription'];
$userName = $_SESSION['username'];
$petLoc = $_POST['PetLocation'];
$petZip = $_POST['PetZipcode'];
$petDate = $_POST['PetDate'];

$img = $_FILES['PetImage']['tmp_name'];

$petImg = addslashes(file_get_contents($img));

$query = "INSERT INTO post(pets_name, pets_type, pets_descript, user_name, date, location, zip_code, picture)
            VALUES('$petName','$petType','$petDesc','$userName','$petDate','$petLoc','$petZip','$petImg')";

mysqli_query($connection, $query);

header("Location: index.php");
?>