<?php
if(!isset($_SESSION["user_id"]))
{
	$_SESSION["user_id"] = null;
}
	$servername = "localhost";
			$username = "root";
			$password = "2020";
			$dbname = "swapbook";

$LogInFailed = false;
$reviewSuccesfull = false;
//All Books
$AllBooksConnection = new mysqli($servername, $username, $password, $dbname);
if ($AllBooksConnection->connect_error) {
	die("Connection failed: " . $AllBooksConnection->connect_error);
}
$sql = "select * from book";
$AllBooksResult = $AllBooksConnection->query($sql);	
$allBooks[]  = array();
while($row = $AllBooksResult->fetch_assoc()) {
	$allBooks[] = $row; 
}

//All users
$allUsers = array();
$AllUsersConnection = new mysqli($servername, $username, $password, $dbname);
if ($AllUsersConnection->connect_error) {
	die("Connection failed: " . $AllUsersConnection->connect_error);
	}
$sql = "select * from user";
$AllUsersResult = $AllUsersConnection->query($sql);	
$allBooks[]  = array();
while($row = $AllUsersResult->fetch_assoc()) {
  $allUsers[] = $row; 
}
	if (!empty($_POST))
	{
		if( isset($_POST["doAddReview"]) && $_POST["doAddReview"] == "yes" )
		{
		$_SESSION["lastTab"] = "swaps";
			$AddReviewConnection = new mysqli($servername, $username, $password, $dbname);
			if ($AddReviewConnection->connect_error) {
				die("Connection failed: " . $AddReviewConnection->connect_error);
			}
			$q_product_id = $_POST["bookSelect"];
			$q_ratedUser_id = $_POST["userSelect"];
			$q_reviewDescription = $_POST["reviewDescription"];
			$q_user_id = $_POST["hiddenUserID"];
			$q_value = $_POST["hiddenRatingValue"];
		
			$sql = "INSERT INTO `swapbook`.`rating`(`user_id`,`ratedUser_id`,`product_id`,`value`,`description`) VALUES (".$q_user_id .", ".$q_ratedUser_id .", ".$q_product_id .", ".$q_value .", \"".$q_reviewDescription."\")";
			
			if ($AddReviewConnection->query($sql) === TRUE) {
				$reviewSuccesfull = true;
			} else {
				echo "Error: " . $sql . "<br>" . $AddReviewConnection->error;
			}
		}

	else if( isset($_POST["doSearch"]) && $_POST["doSearch"] == "yes" )
	{
		if($_POST["searchText"])
		{
		
			$_SESSION["lastTab"] = "home";
		
			// Create connection
			$searchConnection = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($searchConnection->connect_error) {
				die("Connection failed: " . $searchConnection->connect_error);
			}

			$searchText = $_POST["searchText"];
			if(isset($_POST["type"]))
			{
				$type =  $_POST["type"];
			   $sql = "select * from book where (author like '%".$searchText."%' or title like '%".$searchText."%' or isbn like'%".$searchText."%') and type  = ".$type;
			
			}
			else {
				$sql = "select * from book where (author like '%".$searchText."%' or title like '%".$searchText."%' or isbn like'%".$searchText."%') ";
			}
		
			$SearchResult = $searchConnection->query($sql);
			
			if ($SearchResult->num_rows> 0) {

			} 
			else {
				echo "<!--No results!!!!!!!!!!!!!!-->";
				}

		}
		$searchConnection->close();

	}

	else if( isset($_POST["signOut"]))
	{
	
			$_SESSION["lastTab"] = "home";
		$_SESSION["loggedIn"] = false;
	}
	else if(  $_POST["InputEmail1"] &&  $_POST["InputPassword1"]  )
		{
		
			$_SESSION["lastTab"] = "signIn";

			$LogInFailed = true;
			$userName = $_POST["InputEmail1"];
			$password = $_POST["InputPassword1"];
			$sql = "SELECT user_id,  username, password, permission_level, name FROM swapbook.user
			where username = '".$userName."' and password = '".$password."'";

			echo "<!--".$sql."-->";
			$servername = "localhost";
			$username = "root";
			$password = "2020";
			$dbname = "swapbook";

			// Create connection
			$mainConnection = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($mainConnection->connect_error) {
				die("Connection failed: " . $mainConnection->connect_error);
			}

						$result = $mainConnection->query($sql);

						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$_SESSION["user_id"] = $row["user_id"];
							$_SESSION["loggedIn"] = true;
							$_SESSION["lastTab"] = "home";
							$LogInFailed = false;
						} 
						else 
						{
						$_SESSION["lastTab"] = "signIn";
							echo "<!--0 results-->";
						}
						$mainConnection->close();
					}
					else 
					{
						echo "<!--bad logging -->";
					}
				}
		else 
		{
		echo "<!--Empty Post-->";
		}
?>