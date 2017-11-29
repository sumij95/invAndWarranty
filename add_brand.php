<?php include_once('load.php'); ?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>

<?php
if(isset($_POST['add_brand']))
{
  $name = $_POST['brand_name'];
  
  add_new_brand($name);
  echo "<script>alert (\"brand added\")</script>";
}
?>



<div class="col-md-10">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New brand</span>
          </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="add_brand.php" class="clearfix">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                 <i class="glyphicon glyphicon-th-large"></i>
               </span>
               <input type="text" class="form-control" name="brand_name" placeholder="brand Name">
             </div>
         </div>          
         <button type="submit" name="add_brand" class="btn btn-info">Add brand</button>
       </form>
     </div>
   </div>
 </div>
</div>