<?php include_once('load.php'); ?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>

<?php
if(isset($_POST['add_product']))
{
  $p_name = $_POST['product_name'];
  $p_brand = $_POST['product_brand'];
  $p_category = $_POST['product_category'];
  $purchase_price = $_POST['purchase_price'];
    $sale_price = $_POST['sale_price'];
  $warranty_yr = $_POST['warranty_yr'];
  
  add_new_product($p_name, $p_brand,$p_category, $purchase_price,$sale_price,$warranty_yr);
  echo "<script>alert (\"Product added\")</script>";
}
?>



<div class="col-md-9">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Product</span>
          </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_products.php" class="clearfix">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                 <i class="glyphicon glyphicon-th-large"></i>
               </span>
               <input type="text" class="form-control" name="product_name" placeholder="Product Title">
             </div>
           </div>
           <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <br>Select Product Brand</br>
                <select class="form-control" name="product_brand">
                  <option >LG</option>
                  <option >Sony</option>
                </select>
              </div>


              <div class="col-md-6">
                <br>Select Product Category</br>
                <select class="form-control" name="product_category">
                  <option >TV</option>
                  <option >Air Conditioner</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              <br>Unit Purchase Price</br>
              <input type="text" name="purchase_price" size="10" value="0"/>
            </div>
            <div class="col-md-4">
              <br>Unit Sale Price</br>
              <input type="text" name="sale_price" size="10" value="0"/>
            </div>
            <div class="col-md-4">
              <br>Warranty (year)</br>
              <input type="text" name="warranty_yr" size="10" value="1"/>

            </div>
          </div>
          
          <button type="submit" name="add_product" class="btn btn-danger">Add product</button>
        </form>
      </div>
    </div>
  </div>
</div>