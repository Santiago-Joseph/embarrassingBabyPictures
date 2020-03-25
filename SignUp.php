<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>FurEverFriends-Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6"></div>
			<div class="col-sm-6">

				<div class="container">
				<div class="header">
					<h2>Fur-Ever Friends</h2>
					<h6 class="text-center">Sign up to set play dates for your pets</h6>
				</div>
				
				
				<form action="SignUp.php" method="post">
					<?php include('errors.php'); ?>
					<div class="input-group">
					<label>First Name</label>
					<input type="text" name="firstname" value="<?php echo $firstname;?>">
					</div>  
					<div class="input-group">
					<label>Last Name</label>
					<input type="text" name="lastname" value="<?php echo $lastname;?>">
					</div>
					<div class="input-group">
					<label>Phone Number</label>
					<input type="text" name="phone" value="<?php echo $phone;?>">
					</div>    
					<div class="input-group">
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $username; ?>">
					</div>
					<div class="input-group">
					<label>Email</label>
					<input type="email" name="email" value="<?php echo $email; ?>">
					</div>
					<div class="input-group">
					<label>Password</label>
					<input type="password" name="password_1">
					</div>
					<div class="input-group">
					<label>Confirm password</label>
					<input type="password" name="password_2">
					</div>
					<div class="input-group">
					<button type="submit" class="btn" name="signup-btn">Sign Up</button>
					</div>
					<p>
						Already a member? <a href="login.php">Sign in</a>
					</p>
				</form>
				</div>

			</div>
		</div>  
	</div> 
</body>
</html>