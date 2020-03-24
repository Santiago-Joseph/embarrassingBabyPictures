<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

    $postID = $_GET['post_id'];

    include('connection.php');

    $query = "SELECT * 
                FROM post INNER JOIN users
                ON post.user_name = users.username
                WHERE post_id = '$postID'";

    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 0){
        header('location: search.php');
    }

    $post = mysqli_fetch_assoc($result);

    $picquery = "SELECT * FROM post WHERE post_id = '$postID'";

    $picresult = mysqli_query($connection, $picquery);

    $img = mysqli_fetch_array($picresult);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="container allbackground">
    <div class="row">
        <div class="col">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($img['picture']).'" class="img-responsive" width="100%"/>';?>
        </div>
        <div class="col">
            <table class="table">
                <tr>
                    <td>Pet Name</td>
                    <td><?php echo $post['pets_name'];?></td>
                </tr>
                <tr>
                    <td>Owner</td>
                    <td><?php echo $post['firstname'];?> <?php echo $post['lastname'];?></td>
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
            <button type="button" class="btn btn-primary" name="acceptbtn" data-toggle="modal" data-target="#myModal">Accept</button>
            <button type="button" class="btn btn-primary" name="backbtn" onclick="window.location='search.php'">Go back</button>
        </div>
    </div>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Contact Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Thank you for accepting the playdate! Contact <?php echo $post['firstname'];?> by phone or email.</p>
                    <p>Phone number: <?php echo $post['phone'];?></p>
                    <p>Email: <?php echo $post['email'];?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

