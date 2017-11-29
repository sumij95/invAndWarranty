 <?php 
if(!isset($_SESSION))session_start();
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
<?php include_once('load.php'); ?>

<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}</script>


<?php
if(isset($_POST['order_product']) && isset($_SESSION['cart']))
{
  $str = $_POST['sup_info'];
  $sup_id=  explode(" ",$str);
  $sup_id = intval($sup_id[0]);;


  insert_into_order($sup_id,$_SESSION['cart']);
  redirect("ordered_list.php", false); 

  unset($_SESSION['cart']); 
}
?>

<div class="container">
    <div class="col-md-9">
        <div id="printable">
        <h1>Invoice</h1> 
        <p>Order ID: <?php echo $_SESSION['order_id'] ?></p>
        <p>Supplier ID: <?php echo $_SESSION['sup_id'] ?></p>

        <table class="table"> 

            <tr> 
                <th>Name</th> 
                <th>Quantity</th> 

            </tr> 

            <?php 

            $sql="SELECT * FROM product WHERE pro_id IN ("; 

            foreach($_SESSION['cart'] as $id => $value) { 
                $sql.=$id.","; 
            } 
            global $conn;
            $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
            $query=mysqli_query($conn,$sql); 
            $totalnumber=0; 
            while($row=mysqli_fetch_array($query)){ 
                $subtotal=$_SESSION['cart'][$row['pro_id']]['quantity']; 
                $totalnumber+=$subtotal; 
                ?> 
                <tr> 
                    <td><?php echo $row['name'] ?></td> 
                    <td><?php echo $_SESSION['cart'][$row['pro_id']]['quantity'] ?></td> 
                </tr> 
                <?php 

            } 
            ?> 
            <tr> 
                <td colspan="4">Total number of products: <?php echo $totalnumber ?></td> 
            </tr> 

        </table> 
        <br /> 
        <br /> 
    </div>
    <button onclick="printDiv('printable')">Print</button>
    </div>
</div>