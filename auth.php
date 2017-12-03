<?php include_once('load.php'); ?>
<?php

$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);
$role = remove_junk($_POST['role']);

session_start();

if(authenticate($username, $password, $role) == True)
{
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    redirect('index.php',false);
}
else
{ 
    redirect('login.php',false); 
}



?>