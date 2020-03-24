<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

if(isset($_GET['sbtn'])){
    $zip = $_GET['SearchZip'];
    $type = $_GET['SearchType'];
}

include('connection.php');


if($zip != "" and $type != ""){
    $query = "SELECT * FROM post WHERE pets_type = '$type' AND zip_code = '$zip'";
}
else if($zip == "" and $type != ""){
    $query = "SELECT * FROM post WHERE pets_type = '$type'";
}
else if($zip != "" and $type == ""){
    $query = "SELECT * FROM post WHERE zip_code = '$zip'";
}
else{
    $query = "SELECT * FROM post";
}

$result = mysqli_query($connection, $query);

if(!$result){
    echo "Failed to find postings";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search for a Playdate</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body class="container allbackground">
    <h3>Search For A Playdate</h3>
    <form action="search.php" method="get">
    <div class="row">
        <div class="col-md-5">
            <div class="inline row">
                <label class="col-md-3 col-form-label" for="sZip">Zip Code: </label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="sZip" value="<?php echo $zip;?>" name="SearchZip">
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="inline row">
                <label class="col-md-3 col-form-label" for="sType">Pet Type: </label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="sType" value="<?php echo $type;?>" name="SearchType">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <!-- This can either be search or filter, so it shows everything then limits it to zip/type
            or can show nothing until a zip/type is given and the button is pressed, but if zip/type
            is empty can be treated as * so all zipcodes/types -->
                <button class="btn btn-primary" type="submit" name="sbtn">Filter</button>
                <button class="btn btn-primary" type="button" onclick="window.location='index.php'" name="backbtn">Back</button>
        </div>
    </div>
    </form>
    <div class="row">
        <!-- PHP to query database based on filter and run a loop to display the postings -->
        <table class="table table-bordered">
            <tr>
                <th>Pet Name</th>
                <th>Pet Type</th>
                <th>Date</th>
                <th>City</th>
                <th>Zipcode</th>
                <th></th>
            </tr>
<?php
while ($currentPost = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $currentPost['pets_name']; ?></td>
    <td><?php echo $currentPost['pets_type']; ?></td>
    <td><?php echo $currentPost['date']; ?></td>
    <td><?php echo $currentPost['location']; ?></td>
    <td><?php echo $currentPost['zip_code']; ?></td>
    <td><a href="postdetails.php?post_id=<?php echo $currentPost['post_id']; ?>">View</a></td>
</tr>

<?php
}
?>
</table>
    </div>
</body>
</html>