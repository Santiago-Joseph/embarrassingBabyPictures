<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post a Playdate</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body class="container" id="allbody">
    <div class="header">
    <h1>Post a Playdate!</h1>
    </div>
    <form action="createpost.php" method="post" class="form" enctype="multipart/form-data" data-pet="postform">
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="pName">Pet Name:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="pName" name="PetName" placeholder="ex. Charlie" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="pType">Pet Type:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="pType" name="PetType" placeholder="ex. Dog" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="pDesc">Pet Description:</label>
            <div class="col-md-10">
                <textarea class="form-control" rows="3" cols="50" id="pDesc" name="PetDescription" placeholder="Enter text here..." required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="pLoc">City:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="pLoc" name="PetLocation" placeholder="ex. Fullerton" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="pZip">Zipcode:</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="pZip" name="PetZipcode" placeholder="ex. 92835" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="pDate">Date:</label>
            <div class="col-md-10">
                <input type="date" class="form-control" id="pDate" placeholder="mm/dd/yyyy" name="PetDate" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="pImg">Select image:</label>
            <div class="col-md-10">
                <input class="form-control-file border" type="file" id="pImg" name="PetImage" accept="image/*">
            </div>
        </div>
        <div class="buttons">
            <button class="btn btn-primary" type="submit">Post playdate</button>
            <button class="btn btn-primary" onclick="window.location='index.php'" type="button">Cancel</button>
        </div>
    </form>
</body>
</html>