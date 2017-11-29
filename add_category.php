<?php include_once('load.php'); ?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>

<?php
if(isset($_POST['add_category']))
{
  $name = $_POST['category_name'];
  
  add_new_category($name);
  echo "<script>alert (\"category added\")</script>";
}
?>



<div class="col-md-10">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New category</span>
          </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="add_category.php" class="clearfix">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                 <i class="glyphicon glyphicon-th-large"></i>
               </span>
               <input type="text" class="form-control" name="category_name" placeholder="Category Name">
             </div>
         </div>          
         <button type="submit" name="add_category" class="btn btn-info">Add Category</button>
       </form>
     </div>
   </div>
 </div>
</div>