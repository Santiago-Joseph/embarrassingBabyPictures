<?php require_once 'controllers/authController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>FurEverFriends-Register</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            
            <div class="col-md-6 offset-md-6 form-div">
                <form action="signup.php" method="post">
                    <h1 class="text-center titleApp">Fur-Ever Friends</h1>
                    <h6 class="text-center">Sign up to set play dates for your pets</h6>

                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <li> <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" value="<?php echo $firstName; ?>" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" value="<?php echo $lastName; ?>" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="userName">Username</label>
                        <input type="text" name="userName" value="<?php echo $userName; ?>" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="passwordConf">Confirm Password</label>
                        <input type="password" name="passwordConf" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <button type ="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                    </div>
                    <p class="text-center">Already a member? <a href="login.php">Sign In</a></p>

                </form>
            </div>
        </div>
    </div>
</body>
</html>