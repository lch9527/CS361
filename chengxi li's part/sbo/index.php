<?php
if (isset($_POST['search'])) {
    require "lib/search.php";
}
?>

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
    <!-- Set the page to the width of the device and set the zoon level -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/page.css" rel="stylesheet">
</head>

<?php include('sitenav.php'); ?>
<?php include('lib\session.php'); ?>
<?php include('lib\usermenu.php'); ?>
    
<body>
<main>
    <div class="d-flex" id="wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid" style="margin-top:50px">
                <div class="col-12 ">
                    <h2>Search Book Listings</h2>
                        <div id="custom-search-input">
                            <div class="input-group col-md-9">
                                <form method="post" style="padding: 12px 20px">
                                <input type="text" name="search" id="srchform" class="search-query form-control" placeholder="Search by ISBN, Title, or Author" required/>
                                     <input type="submit" value="Search"/>
                                    </form>

                            <?php
                                if (isset($_POST['search'])) {
                                    if (count($results) > 0) {
                                        foreach ($results as $r) {
                                            $image = $r['image'];
                                            $bookid = $r['book_id'];
                                            echo '<table width="800" border="1" cellspacing="2" cellpadding="4">';
                                            echo '<tr><td align="center" width="150"><a href="listing.php?bookid='.$bookid.'">';
                                            echo '<img src="img/book'.$image.'" width="100" height="131"></a>';
                                            echo '<td width="200">'.$r['ISBN'].'</td>';
                                            echo '<td width="250">'.$r['Author'].'</td>';
                                            echo '<td width="700"><a href="listing.php?bookid='.$bookid.'">'.$r['Title'].'</a></td>';
                                            echo '</table>';
                                        }
                                    }
                                    else {
                                        echo "No matches found.";
                                    }
                                }
                                ?>
                            </div>
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