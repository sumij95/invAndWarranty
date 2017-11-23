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
?>