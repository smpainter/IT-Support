<?php
// Initialize the session.  If the session is already started, continue on.   
// Yes, this is the session we want to destroy.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Unset all of the session variables.
// The session array is assigned to an empty array
$_SESSION = array();

// Now... the tricky part... kill the cookie on the browser

$name = session_name();                // Get name of the session cookie
$expire = strtotime('-1 year');        // Create expiration date in the past
setcookie($name, null, $expire);       // Delete the cookie for the session

// Finally, destroy the session.
session_destroy();

// All done with the session.
// Direct the user back to the index.php page
header('Location: ../index.php');
exit();
?>
