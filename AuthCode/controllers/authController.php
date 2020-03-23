<?php

session_start();

require 'config/db.php';

$errors = array();
$userName = "";
$email = "";
$firstName = "";
$lastName = "";
$phone = "";

if(isset($_POST['signup-btn'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    $phone = $_POST['phone'];

    //validate
    if(empty($firstName)){
        $errors['firstName'] = "First name required";
    }
   if(empty($lastName)){
        $errors['lastName'] = "Last name required";
    }
    if(empty($userName)){
        $errors['userName'] = "Username required";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email address is invalid";
    }
    if(empty($email)){
        $errors['email'] = "Email required";
    }
    if(empty($password)){
        $errors['password'] = "Password required";
    }
    if($password !== $passwordConf){
        $errors['password'] = "The two passwords do not match";
    }
    if(empty($phone)){
        $errors['phone'] = "Phone number required";
    }

    //if email exists
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        $errors['email'] = "Email already exists";
    }

    //if username exists
    $userQuery = "SELECT * FROM users WHERE userName=? LIMIT 1";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param('s', $userName);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        $errors['userName'] = "Username already exists";
    }


    if(count($errors) === 0){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;
        
        $sql = "INSERT INTO users (firstName, lastName, userName, email, password, token, phone, verified) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssb', $firstName, $lastName, $userName, $email, $password, $token, $phone, $verified);
        if ($stmt->execute()) {
            //login
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['userName'] = $userName;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['verified']= $verified;
            //set message
            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: index.php');
            exit();
        }else{
            $errors['db_error'] = "Database error: failed to register";
        }

    }


}