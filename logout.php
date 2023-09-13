<!-- header('Location: '.$rootUrl.'/foodie/home.php'); -->
<?php
   session_start();
   session_unset();
   
   setcookie ('LOGGED_USER', "", time() - 3600);
   session_destroy();
   header('Location: '.$rootUrl.'/foodie/contact.php');
   

?>
