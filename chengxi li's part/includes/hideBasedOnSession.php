<script>
<?php

if($_SESSION["loggedIn"] == true)
{
echo '$("#SignOutButton").parent().show();'."\n";
echo '$("#UserDDRightSignOutButton").show();'."\n";
echo '$("#SignInButton").parent().hide();'."\n";
echo '$("#UserDDRightSignInButton").hide();'."\n";
}
else
{
echo '$("#SignOutButton").parent().hide();'."\n";
echo '$("#UserDDRightSignOutButton").hide();'."\n";
echo '$("#SignInButton").parent().show();'."\n";
echo '$("#UserDDRightSignInButton").show();'."\n";
}

?>
</script>