<?php
include_once('load.php'); 
?>


<?php
if(isset($_POST['sales_report']))
{
	$from = $_POST['date_from'];
	$to = $_POST['date_to'];
	if($from > $to)
	{
		$temp=$from;
		$from=$to;
		$to=$temp;
	}	
	$sales = sales_report_from_to($from, $to);
}

if(isset($_POST['purchases_report']))
{
	$from = $_POST['date_from'];
	$to = $_POST['date_to'];
	if($from > $to)
	{
		$temp=$from;
		$from=$to;
		$to=$temp;
	}
	
	$purchases = purchases_report_from_to($from, $to);
}
?>


<script>
	function unhide(clickedButton, divID) 
	{
		var item = document.getElementById(divID);
		if (item) 
		{
			if(item.className=='hidden')
			{
				item.className = 'unhidden' ;
				clickedButton.value = 'Hide'
			}
			else
			{
				item.className = 'hidden';
				clickedButton.value = 'Show'
			}
		}
	}

</script>




<?php
include_once('layouts/header.php');
include_once('layouts/nav.php'); 
?>
<div class="col-md-10">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span>
					<span >Purchases</span>
				</strong>
				<div class="" style="align-self: center; padding: 0px;">
					<form  method="post" action="reports.php">
						From : 
						<input type="date"  name="date_from" placeholder="From" required=""/>
						TO : 	
						<input type="date"  name="date_to" placeholder="To" required=""/>    
						<button class="btn btn-primary" name="purchases_report" type="submit" >Purchases Report</button>
					</form>
				</div> 
			</div>

			<?php 
			if(isset($purchases)):
				if(!empty($purchases)):
					?>
					<div class="panel-body" id="sales_report_id">
						<table class="table table-striped table-bordered table-condensed">
							<thead>
								<tr>
									<th>Purchase ID</th>
									<th>Purchase_date</th>
									<th>Order ID</th>
								</tr>
							</thead>
							<?php 
							if(!empty($purchases)):
								foreach ($purchases as  $pur): ?>
								<tr>
									<td><?php echo $pur['pur_id']; ?></td>

									<td><?php echo $pur['purchase_date']; ?></td>
									<td><?php echo $pur['ord_id']; ?></td>
								</tr>
							<?php endforeach; endif;?>
							<tbody>

							</tbody>
						</table>
					</div>
					<?php 

				endif;
				echo "<h4><b>No data found in between this dates<b><h4>";
			endif;
			?>
		</div>
	</div>
</div>




<div class="col-md-10">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span>
					<span >Sales</span>
				</strong>
				<div class="" style="align-self: center; padding: 0px;">
					<form  method="post" action="reports.php">
						From : 
						<input type="date"  name="date_from" placeholder="From" required=""/>
						TO : 	
						<input type="date"  name="date_to" placeholder="To" required=""/>    
						<button class="btn btn-primary" name="sales_report" type="submit" >Sales Report</button>
					</form>
				</div> 
			</div>

			<?php 
			if(isset($sales)):
				if(!empty($sales)):
					?>
					<div class="panel-body" id="sales_report_id">
						<table class="table table-striped table-bordered table-condensed">
							<thead>
								<tr>
									<th>Sale ID</th>
									<th>Sale_date</th>
									<th>Customer ID</th>
								</tr>
							</thead>
							<?php 
							if(!empty($sales)):
								foreach ($sales as  $sale): ?>
								<tr>
									<td><?php echo $sale['sal_id']; ?></td>

									<td><?php echo $sale['sale_date']; ?></td>
									<td><?php echo $sale['cus_id']; ?></td>
								</tr>
							<?php endforeach; endif;?>
							<tbody>

							</tbody>
						</table>
					</div>
					<?php 
				endif;
				echo "<h4><b>No data found in between this dates<b><h4>";
			endif;

			?>
		</div>
	</div>
</div>












<!-- 
<div class="col-md-10">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span>
					<span>Need to Buy Soon</span>
				</strong>
				<input type="button" onclick="unhide(this, 'test')" value="Show">
			</div>
			<div id="test" class="hidden">

				<div class="panel-body">
					<table class="table table-striped table-bordered table-condensed">
						<thead>
							<tr>
								<th>Product ID</th>
								<th>Name</th>
								<th>Quantity in Stock</th>
							</tr>
						</thead>

						<tbody>
							<?php 
							$products = list_of_lowest_quantity_Products();
							foreach ($products as  $product): ?>
							<tr>
								<td><?php echo $product['pro_id']; ?></td>

								<td><?php echo $product['name']; ?></td>
								<td><?php echo (int)$product['quantity']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>
</div>
 -->
	<?php include_once('layouts/footer.php'); ?>

<!-- 
<div class="col-md-10">
	<div class="panel-body">
		<?php 
		if(isset($sale)):
			if(!empty($sale)):
				$keys = array_keys($results[0]);
				?>
				<div class="panel-heading" style="text-align: center;">
					<p><h2>
						<?php
						echo $_POST['table_name']." Report From ";
						echo $_POST['date_from']." To ";
						echo $_POST['date_to'];
						?>

					</h2></p>
					<div>
						<div class="panel-body" id="sales_report_id">
							<table class="table table-striped table-bordered table-condensed">
								<thead>
									<tr>
										<th><?php echo $keys[1] ?></th>
										<th><?php echo $keys[3] ?></th>
										<th><?php echo $keys[5] ?></th>
									</tr>
								</thead>
								<?php 
								if(!empty($results)):
									foreach ($results as  $row): ?>
									<tr>
										<td><?php echo $row[0]; ?></td>
										<td><?php echo $row[1]; ?></td>
										<td><?php echo $row[2]; ?></td>
									</tr>
								<?php endforeach; endif;?>
								<tbody>

								</tbody>
							</table>
						</div>
						<?php 
					endif;
					else echo "NO data found in between this dates";
				endif;
				?>
			</div>
		</div>
	</div>
</div>
-->