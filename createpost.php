<?php
session_start();

$connection = mysqli_connect('localhost','phpmyadmin','Password1!','database');
if (!$connection){
    echo "Cannot connect to MySQL".mysqli_connect_error();
    exit();
}

$petName = $_POST['PetName'];
$petType = $_POST['PetType'];
$petDesc = $_POST['PetDescription'];
$userName = "Test"; //Replace with session variable once that is set up
$petLoc = $_POST['PetLocation'];
$petZip = $_POST['PetZipcode'];
$petDate = $_POST['PetDate'];

$img = $_FILES['PetImage']['tmp_name'];

$petImg = addslashes(file_get_contents($img));

$query = "INSERT INTO post(pets_name, pets_type, pets_descript, user_name, date, location, zip_code, picture)
            VALUES('$petName','$petType','$petDesc','$userName','$petDate','$petLoc','$petZip','$petImg')";

mysqli_query($connection, $query);

header("Location: about.html");
?>