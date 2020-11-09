<?php
include("config.php");
include("session.php");

$error = '';
$user = $login_session['id'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
  	$image = $_FILES['image']['name'];
  	$target = "img/book".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    
    $sql = "INSERT INTO book (ISBN, Title, Author, descp, user, image)
        VALUES ('$_POST[isbn]', '$_POST[title]', '$_POST[auth]', '$_POST[descp]', '$user', '$image')";
      
      if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header('Location: index.php');
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
}

mysqli_close($conn);
?>