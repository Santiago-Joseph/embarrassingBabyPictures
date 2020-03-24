<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

    $postID = $_GET['post_id'];

    $connection = mysqli_connect('localhost','phpmyadmin','Password1!','database');
    if (!$connection){
    echo "Cannot connect to MySQL".mysqli_connect_error();
    exit();
    }

    $query = "SELECT * FROM post WHERE post_id = '$postID'";

    $result = mysqli_query($connection, $query);

    $post = mysqli_fetch_assoc($result);

    $picquery = "SELECT * FROM post WHERE post_id = '$postID'";

    $picresult = mysqli_query($connection, $picquery);

    $img = mysqli_fetch_array($picresult);


    //NEEDS TO QUERY USER TABLE TO FIND MATCHING USERNAME FOR DETAILS

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body class="container allbackground">
    <div class="row">
        <div class="col">
    <img src="dbimg.php?id=<?php echo $postID ?>" class="img-responsive" width="100%" />
</div>
<div class="col">
    <table class="table">
        <tr>
            <td>Pet Name</td>
            <td><?php echo $post['pets_name'];?></td>
        </tr>
        <tr>
            <td>Owner</td>
            <td><?php echo "Test Name";?></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><?php echo $post['pets_type'];?></td>
        </tr>
        <tr>
            <td>Personality</td>
            <td><?php echo $post['pets_descript'];?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><?php echo $post['date'];?></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><?php echo $post['location'];?></td>
        </tr>
        <tr>
            <td>Zipcode</td>
            <td><?php echo $post['zip_code'];?></td>
        </tr>
    </table>
    <button class="btn btn-primary" name="acceptbtn">Accept</button>
    <button class="btn btn-primary" name="backbtn" onclick="window.location='search.php'">Go back</button>
</div>
</body>
</html>

