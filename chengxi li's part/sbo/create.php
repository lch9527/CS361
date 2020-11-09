<!DOCTYPE html>
<html lang="en">

<head>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
    </script>
    <! [endif]-->
    <title>Swap Book :: Textbook Trades for WSU Students</title>
    <meta charset="UTF-8">
    <!-- If IE use the latest rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Set the page to the width of the device and set the zoom level -->
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link href="css\contact.css" rel="stylesheet">
</head>

<?php include("lib\createbook.php"); ?>
<?php include('sitenav.php'); ?>
<?php include('lib\session.php'); ?>
<?php include('lib\usermenu.php'); ?>
    
<body>

<main>
    <div class="d-flex" id="wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-top:75px">
                <div class="col-12 ">
                    <h3 style="color: #31708e">Create Book Listing</h3>
                        <form method="post" action="" id="listing-form" onsubmit="" enctype="multipart/form-data">
                            <label for="isbn">ISBN</label>
                            <input type="text" id="isbn" name="isbn" placeholder="" required>
                            <label for="title">Book Title</label>
                            <input type="text" id="title" name="title" placeholder="" required>
                            <label for="auth">Author(s)</label>
                            <input type="text" id="auth" name="auth" placeholder="Separate names with a comma" required>
                            <label for="ed">Edition</label>
                            <input type="text" id="ed" name="ed" placeholder="Edition number">
                            <label for="type">Book Type</label>
                            <select id="type" name="type">
                                <option value="hard">Hardcover</option>
                                <option value="paper">Paperback</option>
                                <option value="pdf">PDF</option>
                                <option value="loose">Loose Leaf</option>
                                <option value="other">Other - include details below</option>
                            </select>
                            <label for="descp">Book Details</label>
                            <textarea id="descp" name="descp" placeholder="Describe the book..." style="height:100px"></textarea>
                            <label for="image">Upload a Photo</label>
                            <input type="file" id="image" name="image">
                            <input type="submit" name="upload" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>

<footer>
</footer>

</body>
</html>