<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>FurEverFriends-Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<h3><p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>,</p></h3>
        <br>
		<p>
            Pet Playdate is a website with the intent of helping others find playdates for their pets.
            A pet owner can't always make time for their pets when they have to work all day and want to relax
            at home. That's where we come in! We help set playdates up, so while your pets are playing around
            with other pets you can relax, or if you're just looking for some help finding others to have a
            playdate with, we're here to help!
        </p> 
        <br>
		<div class="buttons">
        <button type="button" class="btn btn-primary" onclick="window.location='search.php'">Search for a playdate!</button>
        <button type="button" class="btn btn-primary" onclick="window.location='post.php'">Post a playdate request!</button>
    	</div> 
        <br>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>