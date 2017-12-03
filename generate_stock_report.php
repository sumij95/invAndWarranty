<?php include_once('load.php'); ?>

<?php
if(isset($_POST['stock_report']))
{
	$pro_id = get_id_from_str($_POST['pro_id']);
	$cat_id = get_id_from_str($_POST['product_category']);
	$bra_id = get_id_from_str($_POST['product_brand']);
	$warranty_yr = $_POST['warranty_yr'];
	$products = get_products_by_ids($pro_id, $cat_id, $bra_id, $warranty_yr);


}
?>



<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<div class="col-md-10" >

	<div class="text-center" style="padding-bottom: 10px">
		<button  onclick="printDiv('printArea')" class="btn btn-primary">Print</button>
	</div>
	<div class="panel panel-default" id="printArea">

		<div class="panel-heading text-center">
			<strong>
				<span class="glyphicon glyphicon-th"></span>
				<span>Stock Report</span>
			</strong>
		</div>
		<div class="panel-body">

			<div class="panel-body">
				<table class="table table-bordered ">
					<thead>
						<th class="text-center" style="width: 20%;"> Product ID</th>
						<th class="text-center" style="width: 20%;"> Name </th>
						<th class="text-center" style="width: 20%;"> Category </th>
						<th class="text-center" style="width: 10%;"> Brand </th>
						<th class="text-center" style="width: 10%;"> Unit Purchase <br> Price </th>
						<th class="text-center" style="width: 10%;"> Unit Sale <br> Price </th>
						<th class="text-center" style="width: 10%;"> Warranty Year </th>
					</thead>
					<tbody>
						<?php foreach ($products as $product):?>
							<tr>
								<td class="text-center"><?php echo $product['pro_id']?></td>
								<td class="text-center"> <?php echo ($product['p_name']); ?></td>
								<td class="text-center"> <?php echo ($product['c_name']); ?></td>
								<td class="text-center"> <?php echo ($product['b_name']); ?></td>
								<td class="text-center"><?php echo ($product['purchase_price']); ?></td>
								<td class="text-center"><?php echo ($product['sale_price']); ?></td>
								<td class="text-center"><?php echo ($product['warranty_yr']); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div style="padding-top: 50px">
				<?php include_once('layouts/footer.php'); ?>
			</div>
		</div>
	</div>
</div>



