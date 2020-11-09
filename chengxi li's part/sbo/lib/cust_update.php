<?php
include("config.php");
include('lib\session.php');

$error = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn,$_POST['first_name']); 
    $last_name = mysqli_real_escape_string($conn,$_POST['last_name']); 
    
        $id = $login_session['id'];
        $sql = "UPDATE user SET first_name='$first_name',last_name='$last_name' WHERE id=$id";
            if (mysqli_query($conn, $sql)) {
                echo "Account updated successfully";
                header('Location: account.php');
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
}

mysqli_close($conn);
?>

