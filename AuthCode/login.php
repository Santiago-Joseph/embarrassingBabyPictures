<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>FurEverFriends-Login</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
             <div class="col-md-6 paw">
                <img src="img/pawprint.png" class="img-fluid pawprint" alt="pawprint">
            </div>

            <div class="col-md-6 form-div login">
                <form action="login.php" method="post">
                    <h1 class="text-center appTitle">Fur-ever Friends</h1>

                    <!-- <div class="alert alert-danger">
                        <li> Username required</li>
                    </div> -->

                    <div class="form-group">
                        <label for="username">Username or Email</label>
                        <input type="text" name="username" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <button type ="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Login</button>
                    </div>
                    <p class="text-center">Not yet a member? <a href="login.php">Sign Up</a></p>

                </form>
            </div>
        </div>
    </div>
</body>
</html>