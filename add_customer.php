<?php include_once('load.php'); ?>
<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<?php
if(isset($_POST['add']))
{
  $c_name = $_POST['cus_name'];
  $c_address = $_POST['address'];
  $c_contact = $_POST['contact'];
  $c_email = $_POST['email'];
  add_new_customer($c_name, $c_address,$c_contact,$c_email);
}
?>



<div class="col-md-10">
  <div class="col-md-8">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Information about customer</span>
        </strong>
      </div>
      <div class="panel-body">
       <div class="col-md-12">
         <form method="post" action="add_customer.php" class="clearfix">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
               <i class="glyphicon glyphicon-th-large"></i>
             </span>
             <input type="text" class="form-control" name="cus_name" placeholder="Customer Name">


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
</div>
