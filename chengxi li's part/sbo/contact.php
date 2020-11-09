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

<?php include('sitenav.php'); ?>
<?php include('lib\session.php'); ?>
<?php include('lib\usermenu.php'); ?>
    
<body>

<main>
    <div class="d-flex" id="wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-top:75px">
                <div class="col-12 ">
                    <h3 style="color: #31708e">Contact SwapBook Support</h3>
                    <h4>We are happy to help!</h4>
                        <form action="https://formspree.io/xledwpjb" method="post">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="" required>
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="" required>
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" placeholder="">
                            <label for="topic">I need help with...</label>
                            <select id="topic" name="topic">
                                <option value="ACC">Account Help</option>
                                <option value="DISP">Swap Dispute</option>
                                <option value="TECH">Technical Support</option>
                                <option value="OTHER">Other</option>
                            </select>
                            <label for="subject">Message</label>
                            <textarea id="subject" name="subject" placeholder="" style="height:100px"></textarea>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
</footer>

</body>
</html>