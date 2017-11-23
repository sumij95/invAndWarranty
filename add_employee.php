<?php include_once('load.php'); ?>
<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>

<?php
if(!isset($_SESSION))session_start();

if(!isset($_SESSION['username']) || $_SESSION['username']!="admin")redirect('login.php', false);

?>
<?php
if(isset($_POST['add']))
{
  $e_name = $_POST['emp_name'];
  $e_address = $_POST['address'];
  $e_contact = $_POST['contact'];
  $e_email = $_POST['email'];


  if(add_new_employee($e_name, $e_address,$e_contact,$e_email))
  { 
    redirect('add_employee.php');
  }
  else echo "error in adding product";
}
?>


<div class="col-md-10">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Information about employee</span>
        </strong>
      </div>
      <div class="panel-body">
       <div class="col-md-12">
         <form method="post" action="add_employee.php" class="clearfix">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
               <i class="glyphicon glyphicon-th-large"></i>
             </span>
             <input type="text" class="form-control" name="emp_name" placeholder="Employee Name">


           </div>
           <span class="glyphicons glyphicons-phone-alt"></span>
           <input type="text" class="form-control" name="address" placeholder="Address" required="">
           <input type="text" class="form-control" name="contact" placeholder="Contact" required="">
           <input type="email" class="form-control" name="email" placeholder="Email" required="">
         </div>
         <button type="submit" name="add" class="btn btn-danger">Add info</button>
       </form>
     </div>
   </div>
 </div>
</div>