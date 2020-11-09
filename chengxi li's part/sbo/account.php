<?php
if (isset($_POST['search'])) {
    require "lib/search.php";
}
include("lib/cust_update.php");
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
        <hr>
                <div class="row">
                    <div class="col-sm-10"><h3>Hello,&nbsp;<?php echo $login_session['first_name']; ?></h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-3"><!--left col-->
                        <div class="text-center">
                            <img src="img/default.png" class="avatar img-circle img-thumbnail" alt="avatar"><h6>Upload a photo...</h6>
                            <input type="file" class="text-center center-block file-upload" id="image" name="image">
                        </div></hr><br>
                    
                    <div class="panel panel-default">
                    </div>
                    
                    <ul class="list-group">
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Reviews</strong></span>4.97 &#x2605</li>
                    </ul>
                </div><!--/col-3-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
                        <li><a data-toggle="tab" href="#settings">Security</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            
                            <h3>Profile Information</h3>
                            <p>Your first and last name will not appear anywhere else on SwapBook.</p>
                            <hr>
                            
                            <form class="form" action="" method="post" id="updateform" onsubmit="">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="first_name"><h4>First Name</h4></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $login_session['first_name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Last Name</h4></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $login_session['last_name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $login_session['email']; ?>"readonly>
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="acc_date"><h4>Member Since</h4></label>
                              <input type="acc_date" class="form-control" name="acc_date" id="acc_date" placeholder="<?php echo $login_session['acc_date']; ?>" readonly>
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit" style="background-color:#5085a5; border:none"><i class="glyphicon glyphicon-ok-sign"></i> Update Profile</button>
                            </div>
                      </div>
              	</form>         
              <hr>
              
             </div><!--/tab-pane-->
             
             <div class="tab-pane" id="settings">
                 <h3>Change Password</h3>
                 <p>Password must be at least 8 characters including a number and a uppercase letter.</p>
                 <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          <div class="col-md-7">
                              <label for="currPw"><h4>Current Password</h4></label>
                              <input type="password" class="form-control" name="currPw" id="password" title="Required field">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="col-md-7">
                              <label for="newPw"><h4>New Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" title="Required field">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="col-md-7">
                            <label for="password2"><h4>Confirm New Password</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" title="Required field">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit" style="background-color:#5085a5; border:none"><i class="glyphicon glyphicon-ok-sign"></i> Update Password</button>
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      
            
            
            
            
        </main>
    </body>
</html>

