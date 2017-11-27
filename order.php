
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
  $_SESSION['order_products'] = list_of_products();
?>


<?php
if(isset($_POST['order_product']) && isset($_SESSION['cart']))
{
  $str = $_POST['sup_info'];
  $sup_id=  explode(" ",$str);
  $sup_id = intval($sup_id[0]);;


  insert_into_order($sup_id,$_SESSION['cart']);
  require("ordered_list".".php"); 

  unset($_SESSION['cart']); 
}
?>



<div class="col-md-9">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Place an order</span>
        </strong>
      </div>
      
      <div class="panel-body">

       <div class="col-md-12">
        <form method="post" action="order.php" class="clearfix">
            
            <div class="pull-right">
              <a href="add_customer.php">
                <button   class="btn btn-info">Add New Supplier</button>
              </a>
            </div>
          
            <div class="pull-left">
            <strong><h4>Supplier Company Name</h4></strong>
            </div>

          <div id='div_session_write'> 
           <select class="form-control" id="sup_info" name="sup_info">
            <?php foreach ($suppliers as $supplier):?>
              <option ><?php echo ($supplier['sup_id'].' -'.$supplier['name']);?></option>
            <?php endforeach; ?> 
          </select>
        </div>
</br>
        <button type="submit" name="order_product" class="btn btn-danger">place order</button>
      </form>
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
            $sql.=$id.","; 
          } 

          $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
global $conn;
// echo $sql;
$query = mysqli_query($conn, $sql); 
while($query &&  $row=mysqli_fetch_array($query)){ 

  ?> 
  <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['pro_id']]['quantity'] ?></p> 
  <?php 

} 
?> 
<hr/> 
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
</div>