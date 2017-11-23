<?php
session_start();

if(isset($_SESSION['cart']))
	unset($_SESSION['cart']);
echo "done ";

if(isset($_SESSION['username']))
	unset($_SESSION['username']);

if(isset($_SESSION['password']))
	unset($_SESSION['password']);
unset($_SESSION);
 
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
// redirect('index.php');
header("Location:  login.php");
exit;
?>