<?php
include_once('load.php');
include_once('layouts/header.php');
include_once('layouts/nav.php'); 
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
?>








<div class="col-md-10">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						<span class="glyphicon glyphicon-th"></span>
						<span>Purchase Report and other will be added here </span>
					</strong>
				</div>
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







<div class="row">
	<div class="col-md-12">
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
						<button class="btn btn-primary" name="sales_report" type="submit">Sales Report</button>
					</form>
				</div> 
			</div>
			<div class="panel-body">
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
		</div>
	</div>
</div>













<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span>
					<span>Need to Buy Soon</span>
				</strong>
			</div>
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
<?php include_once('layouts/footer.php'); ?>
