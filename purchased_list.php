<?php include_once('load.php'); ?>

<?php
if(!isset($_SESSION))session_start();

if(isset($_POST['purchase_product']))
{
	$ord_id = $_POST['ord_id'];
	add_to_stock($ord_id);
	insert_into_purchase($ord_id);
	$pur_id = get_last_purchase_id();
}
else
{
	echo "No order ID selected";
}
?>







<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<div class="container">
	<div class="col-md-10">
		<div id="printable">
			<h1>Invoice</h1> 
			<p>Order ID: <?php echo $_SESSION['order_id'] ?></p>
			<p>Supplier ID: <?php echo $_SESSION['sup_id'] ?></p>
			<p>Purchase ID: <?php echo $pur_id ?></p>
			<p>Purchase Date: <?php echo get_purchase_date($pur_id) ?></p>

			<table class="table"> 

				<thead>
					<th>Product ID</th> 
					<th>Name</th> 
					<th>Quantity</th>
					<th>Unit Purchase Price</th> 
					<th>Total Purchase Price</th> 

				</thead>

				<?php 
				$produtcs = get_products_by_purchase_id($pur_id);
				$grand_total = 0;
				foreach ($produtcs as $row) {
					$total = $row['quantity'] * $row['purchase_price'];
					echo "<tr>";
					echo "<td>".$row['pro_id']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['quantity']."</td>";
					echo "<td>".$row['purchase_price']."</td>";
					echo "<td>".$total."</td>";
					echo "</tr>";
					$grand_total += $total;
				}

				?> 

				<tr> 
					<td colspan="4">Total Amount: <?php echo $grand_total?></td> 
				</tr> 
			</table> 
			<br /> 
			<br /> 
		</div>
		<button onclick="printDiv('printable')">Print</button>
	</div>
</div>


<?php
if(isset($_POST['purchase_product']))unset($purchase_product);
if(isset($_SESSION['cart']))unset($_SESSION['cart']); 
?>