
<?php 
session_start(); 

if(isset($_GET['page'])){ 

  $pages=array("products", "cart"); 

  if(in_array($_GET['page'], $pages)) { 
    $_page=$_GET['page']; 
  }else{ 
    $_page="products"; 
  } 
}else{ 
  $_page="products"; 
} 
?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<?php include_once('load.php'); ?>

<?php 
$suppliers = list_of_suppliers();
$_SESSION['order_products'] = list_of_products_in_stock();
?>




<div class="col-md-10">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Place an order</span>
        </strong>
      </div>
      
      <div class="panel-body">

        <form method="post" action="ordered_list.php" class="clearfix">

          <div class="row">

            <div class="col-sm-8">
              <strong><h4>Supplier Company Name</h4></strong>
            </div>

          </div>

          <div class="row">
            <div class="col-md-8"> 
             <select class="form-control" id="sup_info" name="sup_info">
              <?php 
              foreach ($suppliers as $supplier)
              {
               echo '<option >';
               echo ($supplier['sup_id'].' -'.$supplier['company_name']);
               echo '</option>';
             }
             ?> 
           </select>
         </div>
         <div class="col-md-4">
          <button type="submit" name="order_product" class="btn btn-danger">place order</button>
        </div>
      </div>

    </form>
  </div>

</div>
<div class="row">
  <div class="col-md-8"> 
   <?php require($_page.".php"); ?>
 </div>

 <div class="col-md-4"> 
  <h1>list of ordered</h1> 
  <?php 

  if(isset($_SESSION['cart'])){ 

    $sql="SELECT * FROM product WHERE pro_id IN ("; 

    foreach($_SESSION['cart'] as $id => $value) { 
      $sql.="'".$id."',"; 
    } 

    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
    global $conn;
    
    $query = mysqli_query($conn, $sql); 

    while($query &&  $row=mysqli_fetch_array($query)){ 

      ?> 
      <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['pro_id']]['quantity'] ?></p> 
      <?php 

    } 
    ?>  
    <a class = "btn  btn-primary" href="order.php?page=cart">Go to order list</a> 
    <?php 

  }else{ 

    echo "<p>Your list is empty. Please add some products.</p>";
  } 

  ?>
</div>
</div>

</div>
</div>
<?php include_once('layouts/footer.php'); ?>
