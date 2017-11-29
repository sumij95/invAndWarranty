<?php include_once('load.php'); ?>
<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password']))
{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}
else
{
	redirect('login.php',false); 
}
?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						<span class="glyphicon glyphicon-th"></span>
						<span>Highest Selling Products</span>
					</strong>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-condensed">
						<thead>
							<tr>
								<th>Title</th>
								<th>Total Quantity</th>
							</tr>
						</thead>
						
						<tbody>
							<?php 
							$products_sold = list_of_most_quantity_sales();
							foreach ($products_sold as  $product_sold): ?>
								<tr>
									<td><?php echo $product_sold['name']; ?></td>
									<td><?php echo (int)$product_sold['total_quantity']; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						<span class="glyphicon glyphicon-th"></span>
						<span>LATEST SALES</span>
					</strong>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-condensed">
						<thead>
							<tr>
								<th class="text-center" style="width: 30px;">#</th>
								<th>Product Name</th>
								<th>Sale Date</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$count_ = 1;
							$recent_sales = list_of_latest_sales();
							foreach ($recent_sales as  $recent_sale): ?>
								<tr>
									<td class="text-center"><?php echo $count_++;?></td>
									<td><?php echo $recent_sale['name']; ?></td>
									<td><?php echo $recent_sale['sale_date']; ?></td>
									<td>$<?php echo $recent_sale['amount']; ?></td>
								</tr>

							<?php endforeach; ?>
						</tbody> 
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>
						<span class="glyphicon glyphicon-th"></span>
						<span>Latest Added Products</span>
					</strong>
				</div>
				<div class="panel-body">

					<div class="list-group">
						<h4 class="list-group-item-heading">
							<b>Name</b>
							<span class="list-group-item-text pull-right">
							<b>Brand</b>
							</span>
						</h4>
						<?php 
						$recent_products = list_of_latest_products();
						foreach ($recent_products as  $recent_product): ?>
						<a class="list-group-item clearfix" href="edit_product.php?id=<?php echo    (int)$recent_product['pro_id'];?>">
							<h4 class="list-group-item-heading">

								<?php echo $recent_product['name'];?>
								<span class="list-group-item-text pull-right">
									<?php echo $recent_product['brand']; ?>
								</span>

							</h4>

						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="navbar-fixed-bottom">
<?php include_once('layouts/footer.php'); ?>
</div>