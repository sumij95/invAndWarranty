<?php include_once('load.php'); ?>
<?php

if(isset($_POST['add']))
{
  $s_name = $_POST['sup_name'];
  $s_address = $_POST['address'];
  $s_contact = $_POST['contact'];
  $s_email = $_POST['email'];



  if(add_new_supplier($s_name, $s_address,$s_contact,$s_email))
  { 
    echo "<script>alert (\"New Supplier Successfully added\")</script>";
    redirect('add_supplier.php');
  }
  else echo "error in adding product";
}
?>



<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<div class="col-md-9">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Information about Supplier</span>
        </strong>
      </div>
      <div class="panel-body">
       <div class="col-md-12">
       <form method="post" action="add_supplier.php" class="clearfix">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
               <i class="glyphicon glyphicon-th-large"></i>
             </span>
             <input type="text" class="form-control" name="sup_name" placeholder="Supplier Name" required="">


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