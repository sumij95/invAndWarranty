
<?php include_once('load.php'); ?>

<?php 
if(!isset($_SESSION))session_start(); 

if(!isset($_SESSION['products']))
{
  $products = list_of_products();
  $_SESSION['products'] = $products;
  $pro_quantity = array();
  foreach ($products as $row) {
    $pro_quantity[$row['pro_id']]= $row['quantity'];
  }
  $_SESSION['pro_quantity'] = $pro_quantity;
}



if(isset($_GET['page']))
{ 
  $pages=array("sale_products", "cart"); 

  if(in_array($_GET['page'], $pages)) 
  { 

    $_page=$_GET['page']; 
  }
  else
  { 
    $_page="sale_products"; 
  } 
}
else
{ 
  $_page="sale_products"; 
} 
?>




<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<?php $customers = list_of_customers();?>

<?php
if(isset($_POST['sale']) && isset($_SESSION['cart']))
{
  $str = $_POST['cus_info'];
  $cus_id=  explode(" ",$str);
  $cus_id = intval($cus_id[0]);
$_SESSION['cus_id'] = $cus_id;

 insert_into_sale_and_stock($cus_id,$_SESSION['cart']);
 insert_into_warranty($_SESSION['cart']);
 require("sale_list".".php"); 
 unset($_SESSION['cart']); 
 unset($_SESSION['pro_quantity']); 
 unset($_SESSION['products']) ;
 unset($_SESSION['cus_id']);
}


?>
<div class="col-md-9">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Sell products</span>
        </strong>
      </div>
      
      <div class="panel-body">

       <div class="col-md-12">
        <form method="post" action="sale.php" class="clearfix">
          <div class="form-group">
            <br>Customer</br>
            <select class="form-control" name="cus_info">
              <?php foreach ($customers as $customer):?>

                <option ><?php echo ($customer['cus_id'].' -'.$customer['name']);?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" name="sale" class="btn btn-danger">Sell Products</button>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8"> 
        <?php 
          // echo $_page;
           require($_page.".php"); ?>
      </div>
      <div class="col-md-4"> 
        <h1>Cart</h1> 
        <?php 

        if(isset($_SESSION['cart'])){ 

          $sql="SELECT * FROM product WHERE pro_id IN ("; 

            foreach($_SESSION['cart'] as $id => $value) { 
              $sql.=$id.","; 
            } 

            $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
global $conn;
$query=mysqli_query($conn, $sql); 
while($row=mysqli_fetch_array($query)){ 

  ?> 
  <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['pro_id']]['quantity'] ?></p> 
  <?php 

} 
?> 
<hr /> 
<a href="sale.php?page=cart">Go to order list</a> 
<?php 

}else{ 

  echo "<p>Your list is empty. Please add some products.</p>";
} 

?>
</div>
</div>
