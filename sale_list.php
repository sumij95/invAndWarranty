
<?php include_once('load.php'); ?>

<?php
if(!isset($_SESSION))session_start(); 


if(isset($_POST['sale']) && isset($_SESSION['cart']))
{
  $str = $_POST['cus_info'];
  $cus_id=  explode(" ",$str);
  $cus_id = $cus_id[0];
  $_SESSION['cus_id'] = $cus_id;

  insert_into_sale_and_stock($cus_id,$_SESSION['cart']);
  insert_into_warranty($_SESSION['cart']);  

}  

else 
{
  redirect("sale.php", false);
}
?>


<?php 

if(isset($_POST['submit'])){ 

  foreach($_POST['quantity'] as $key => $val) { 
    if($val==0) { 
      unset($_SESSION['cart'][$key]); 
    }else{ 
      $_SESSION['cart'][$key]['quantity']=$val; 
    } 
  } 

} 

?> 

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>


<div class="col-md-10">
  <div class="row text-center form-group">
    <button class="btn btn-primary" onclick="printDiv('printable')">Print</button>
  </div>

  <div class="row"> 

    <div id="printable" class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Invoice</span>
        </strong>
      </div>

      <div class="panel-body">
        <p>Sale ID: <?php echo $_SESSION['sal_id'] ?></p>
        <p>Customer ID: <?php echo $_SESSION['cus_id'] ?></p>

        <table class="table"> 
          <thead>

            <tr> 
              <th>Name</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total Price</th>
            <!-- <th class="text-center" style="width: 10%;">Name</th>
            <th class="text-center" style="width: 30%;"> Quantity </th>
            <th class="text-center" style="width: 30%;"> Unit <br> price </th>
            <th class="text-center" style="width: 20%;"> Total <br>price</th> -->
          </tr> 
        </thead>
        <tbody>
          <?php 

          $sql="SELECT * FROM product WHERE pro_id IN ("; 

          foreach($_SESSION['cart'] as $id => $value) { 
            $sql.="'".$id."',"; 
          } 
          global $conn;
          $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
          $query=mysqli_query($conn,$sql); 
          $totalnumber=0;
          $grand_total = 0; 
          while($row=mysqli_fetch_array($query)){ 
            $subtotal=$_SESSION['cart'][$row['pro_id']]['quantity']; 
            $totalnumber+=$subtotal;
            ?> 
            <tr> 
              <td><?php echo $row['name'] ?></td> 
              <td><?php echo $_SESSION['cart'][$row['pro_id']]['quantity'] ?></td>
              <td><?php echo $row['sale_price'] ?></td>
              <td><?php 
              $total = $row['sale_price']*$_SESSION['cart'][$row['pro_id']]['quantity'];
              echo $total;
              $grand_total = $grand_total+$total;

              ?></td> 

            </tr> 
            <?php 

          } 
          ?>
        </tbody>
        <tr> 
          <td colspan="4" class="pull-right">Grand Total Price: <?php echo $grand_total ?></td> 
        </tr> 

      </table> 
      <br> 
      <br> 
    </div>
  </div>
</div>
</div>






<?php

if(isset($_POST['sale']))unset($_POST['sale']);
if(isset($_SESSION['cart']))unset($_POST['cart']);

unset($_SESSION['cart']); 
unset($_SESSION['pro_quantity']); 
unset($_SESSION['products']) ;
unset($_SESSION['cus_id']);
?>










