<?php include_once('load.php'); ?>



<?php
if(isset($_POST['generate_report']))
{
	$table_name = $_POST['table_name'];
	$from = $_POST['date_from'];
	$to = $_POST['date_to'];
	if($from > $to)
	{
		$temp=$from;
		$from=$to;
		$to=$temp;
	}	

	if($table_name=='Sale' || $table_name=='Purchase' || $table_name=='Order')$results = generate_report($table_name, $from, $to);

	if( $_POST['table_name'] == 'Sale')
	{
		$sale = sale_report($results);
	}

	if( $_POST['table_name'] == 'Order')
	{
		$order = order_report($results);
	}

	if( $_POST['table_name'] == 'Purchase')
	{
		$purchase = purchase_report($results);
	}
	if( $_POST['table_name'] == 'Sale_all_products')
	{
		$sale_all_products = sale_report_all_products();
		// print_r($sale_all_products);
	}

}
?>




<?php
include_once('layouts/header.php');
include_once('layouts/nav.php'); 
?>

<body>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4 text-center" style="padding-bottom: 50px padding-top: 5px">
				<button onclick="printDiv('printdiv')" class="btn btn-info">Print</button>
			</div>
		</div>
		<div id="printdiv">
			<div>
				<?php 
				if(isset($sale)):
					if(!empty($sale)):
						?>
						<div class="panel-heading col-md-12 pull-center" style="text-align:center;">
							<h2>
								<?php echo $_POST['table_name'].' Report'?>
							</h2>
							<div class="panel-heading col-md-6 pull-left">
								<?php 
								echo 'Date from: '.$_POST['date_from']
								?>
							</div>
							<div class="panel-heading col-md-6 pull-right">
								<?php 
								echo 'Date To: '.$_POST['date_to']
								?>
							</div>							
						</div>
						<div>
							<div class="panel-body" id="sales_report_id">
								<table class="table table-striped table-bordered table-condensed">
									<thead>
										<tr>
											<th><?php echo 'Sale ID'?></th>
											<th><?php echo 'Sale Date' ?></th>
											<th><?php echo 'Customer Name' ?></th>
											<th><?php echo 'Quantity' ?></th>
											<th><?php echo 'Profit' ?></th>
										</tr>
									</thead>

									<?php 
									for ($i = 0; $i <count($sale) ; $i++) 
									{	
										echo "<tr>";
										foreach ($sale[$i] as  $field): 
											echo "<td>".$field."</td>";
										endforeach;
										echo "<tr>";

									}
									?>

								</tbody>
							</table>
						</div>
						<?php
					else:
						echo "NO data found in between this dates";

					endif;
				endif;

				if(isset($order)):
					if(!empty($order)):
						?>
						<div class="panel-heading" style="text-align:center;">
							<h2>
								<?php echo $_POST['table_name'].' Report'?>
							</h2>

						</div>
						<div>
							<div class="panel-body" id="orders_report_id">
								<table class="table table-striped table-bordered table-condensed">
									<thead>
										<tr>
											<th><?php echo 'order ID'?></th>
											<th><?php echo 'order Date' ?></th>
											<th><?php echo 'Supplier Company Name' ?></th>
											<th><?php echo 'Quantity' ?></th>
										</tr>
									</thead>

									<?php 
									for ($i = 0; $i <count($order) ; $i++) 
									{	
										echo "<tr>";
										foreach ($order[$i] as  $field): 
											echo "<td>".$field."</td>";
										endforeach;
										echo "<tr>";

									}
									?>

								</tbody>
							</table>
						</div>
						<?php
					else:
						echo "NO data found in between this dates";
					endif;
				endif;

				if(isset($purchase)):
					if(!empty($purchase)):
						?>
						<div class="panel-heading" style="text-align:center;">
							<h2>
								<?php echo $_POST['table_name'].' Report'?>
							</h2>

						</div>
						<div>
							<div class="panel-body" id="purchase_report_id">
								<table class="table table-striped table-bordered table-condensed">
									<thead>
										<tr>
											<th><?php echo 'purchase ID'?></th>
											<th><?php echo 'purchase Date' ?></th>
											<th><?php echo 'Supplier Company Name' ?></th>
											<th><?php echo 'Quantity' ?></th>
										</tr>
									</thead>

									<?php 
									for ($i = 0; $i <count($purchase) ; $i++) 
									{	
										echo "<tr>";
										foreach ($purchase[$i] as  $field): 
											echo "<td>".$field."</td>";
										endforeach;
										echo "<tr>";
									}
									?>

								</tbody>
							</table>
						</div>
						<?php
					else:
						echo "NO data found in between this dates";
					endif;
				endif;
				if(isset($purchase)):
					if(!empty($purchase)):
						?>
						<div class="panel-heading" style="text-align:center;">
							<h2>
								<?php echo $_POST['table_name'].' Report'?>
							</h2>

						</div>
						<div>
							<div class="panel-body" id="purchase_report_id">
								<table class="table table-striped table-bordered table-condensed">
									<thead>
										<tr>
											<th><?php echo 'purchase ID'?></th>
											<th><?php echo 'purchase Date' ?></th>
											<th><?php echo 'Supplier Company Name' ?></th>
											<th><?php echo 'Quantity' ?></th>
										</tr>
									</thead>

									<?php 
									for ($i = 0; $i <count($purchase) ; $i++) 
									{	
										echo "<tr>";
										foreach ($purchase[$i] as  $field): 
											echo "<td>".$field."</td>";
										endforeach;
										echo "<tr>";
									}
									?>

								</tbody>
							</table>
						</div>
						<?php
					else:
						echo "NO data found in between this dates";
					endif;
				endif;

				if(isset($sale_all_products________________)):
					if(!empty($sale_all_products)):
						?>
						<div class="panel-heading" style="text-align:center;">
							<h2>
								<?php echo $_POST['table_name'].' Report'?>
							</h2>

						</div>
						<div>
							<div class="panel-body" id="purchase_report_id">
								<table class="table table-striped table-bordered table-condensed">
									<thead>
										<tr>
											<th><?php echo 'purchase ID'?></th>
											<th><?php echo 'purchase Date' ?></th>
											<th><?php echo 'Supplier Company Name' ?></th>
											<th><?php echo 'Quantity' ?></th>
										</tr>
									</thead>

									<?php 
									for ($i =0 ; $i <count($sale_all_products) ; $i++) 
									{	
										echo "<tr>";
										$j=0;
										foreach ($sale_all_products[$i] as $row):
										    if(($j%2)==0)continue;
											echo "<td>".$row."</td>";
										    $j = 5;	
									endforeach;
										echo "<tr>";
									}
									?>

								</tbody>
							</table>
						</div>
						<?php
					else:
						echo "NO data found in between this dates";
					endif;
				endif;


				?>


			</div>
		</div>


		<div style="padding-top: 50px">
			<?php include_once('layouts/footer.php'); ?>
		</div>
	</div>

</div>

</div>


</div>


</body>

<?php 
if(isset($sale))unset($sale);
if(isset($order))unset($order); 
if(isset($purchase))unset($purchase);
?>























