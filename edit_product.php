<?php include_once('load.php'); ?>
<?php $product = find_product_by_id((int)$_GET['id']);?>


<?php 
if(!isset($_SESSION))session_start(); 
$_SESSION['action_page'] = "edit_product.php?id=".(int)$_GET['id'];
?>

<?php
if(isset($_POST['product'])){
  $p_id = (int)$_GET['id'];
  $p_name = $_POST['product_name'];
  $p_brand = $_POST['product_brand'];
  $p_category = $_POST['product_category'];

  $purchase_price = $_POST['purchase_price'];
  $sale_price = $_POST['sale_price'];
  $warranty_yr = $_POST['warranty_yr'];


  echo "updating..";

  update_product_by_id($p_id, $p_name, $p_brand,$p_category, $purchase_price,$sale_price,$warranty_yr);
  echo "<script>alert (\"Product Editted\")</script>";   

}
?>
<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>

<div class="col-md-10">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Edit Product</span>
        </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="<?php echo($_SESSION['action_page'])?>" class="clearfix">
         <h5>Name of the product</h5>
         <input type="text" class="form-control" name="product_name" value="<?php echo $product['name'];?>">

         <div class="row">
          <div class="col-md-6">
            <h5>Brand</h5>
            <select class="form-control" name="product_brand">
              <option >LG</option>
              <option >Sony</option>
            </select>
          </div>
          <div class="col-md-6">
            <h5>Category</h5>
            <select class="form-control" name="product_category">
              <option >TV</option>
              <option >Air Conditioner</option>
            </select>
          </div>
        </div>

        <div class="row">
         <div class="col-md-4">
          <label for="qty">Purchase price</label>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="glyphicon glyphicon-usd"></i>
            </span>
            <input type="number" class="form-control" name="purchase_price" value="<?php echo $product['purchase_price'];?>">
            <span class="input-group-addon">.00</span>
          </div>
        </div>

        <div class="col-md-4">
          <label for="qty">Sale price</label>
          <div class="input-group">
           <span class="input-group-addon">
             <i class="glyphicon glyphicon-usd"></i>
           </span>
           <input type="number" class="form-control" name="sale_price" value="<?php echo $product['sale_price'];?>">
           <span class="input-group-addon">.00</span>
         </div>
       </div>
       <div class="col-md-4">
          <label for="qty">Warranty in Year</label>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="glyphicon glyphicon-usd"></i>
            </span>
            <input type="number" class="form-control" name="warranty_yr" value="<?php echo $product['warranty_yr'];?>">
          </div>
        </div>
     </div>

     <button type="submit" name="product" class="btn btn-danger">Update</button>
   </form>
 </div>
</div>
</div>
</div>

