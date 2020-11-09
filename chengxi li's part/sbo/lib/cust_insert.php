<?php
include("config.php");
session_start();

$error = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    $myusername = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pw']); 
    
    if(strlen($pwd) < 8 || !preg_match("#[0-9]+#", $pwd) || !preg_match("#[A-Z]+#", $pwd)) {
        $error = "Password is too weak";
    }
    else{
        $sql = "INSERT INTO user (first_name, last_name, email, pw)
        VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[pw]')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header('Location: index.php');
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>