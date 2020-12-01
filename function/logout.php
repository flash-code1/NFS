<?php
  // get connections for all pages
  include('db/config.php');
?>
<?php
// Initialize the session
session_start();
$activecode = date('Y-m-d H:i:s');
$acuser = $_SESSION["email"];
$activeq = "UPDATE `users` SET users.last_logged ='$activecode' WHERE users.email ='$acuser'";
$rezz = mysqli_query($con, $activeq);
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: ../index.php");

exit;
?>