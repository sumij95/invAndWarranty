<?php include_once('load.php'); ?>




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
					<span >Reports</span>
				</strong>
			</div>
			<div class="panel-body">
				<div class="" style="align-self: center; padding: 0px;">
					<form  method="post" action="generate_report.php">
						<div class="form-group">
							<div class="col-md-4">   
								<select class="form-control" name="table_name">
									<option></option>
									<option>Sale</option>
									<option>Sale_all_products</option>
									<option>Purchase</option>
									<option>Order</option>
								</select>
							</div>

							From : 
							<input type="date"  name="date_from" placeholder="From" required=""/>
							TO : 	
							<input type="date"  name="date_to" placeholder="To" required=""/> 
						</div>
						<button class="btn btn-primary" name="generate_report" type="submit" > Generate Report</button>
					</form>
				</div> 
			</div>
		</div>
	</div>
</div>

<div class="col-md-10">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span>
					<span >Stock Report</span>
				</strong>
			</div>
			<div class="panel-body">
				<div class="" style="align-self: center; padding: 0px;">
					<form  method="post" action="generate_stock_report.php">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									Product Name
									<select class="form-control" name="pro_id">
										<option selected="selected">All</option>
										<?php 
										$rows = list_of_products_in_stock();
										foreach ($rows as $row)
										{
											echo '<option >';
											echo ($row['pro_id'].' -'.$row['name']);
											echo '</option>';
										}
										?> 
									</select>
								</div>
								<div class="col-md-3">
									Product Category

									<select class="form-control" name="product_category">
										<option selected="selected">All</option>
										<?php 
										$rows = rows_in_table('product_category');

										foreach ($rows as $row)
										{
											echo '<option >';
											echo ($row['cat_id'].' -'.$row['name']);
											echo '</option>';
										}
										?> 
									</select>
								</div>
								<div class="col-md-3">
									Product Brand
									<select class="form-control" name="product_brand">
										<option selected="selected">All</option>
										<?php 
										$rows = rows_in_table('product_brand');
										foreach ($rows as $row)
										{
											echo '<option >';
											echo ($row['bra_id'].' -'.$row['name']);
											echo '</option>';
										}
										?> 
									</select>
								</div>
							<div class="col-md-3">
								Warranty Duration
								<select class="form-control" name="warranty_yr">
									<option selected="selected">Any</option>
									<option >1</option>
									<option >2</option>
									<option >3</option>
									<option >4</option>
									<option >5</option>
									<option >6</option>
									<option >7</option>
									<option >8</option>
									<option >9</option>
									<option >10</option>
								</select>
							</div>
						</div>
						<div style="padding-top: 5px">
							<button class="btn btn-primary" name="stock_report" type="submit" > Generate Report</button>
						</div>
					</form>
				</div> 
			</div>
		</div>
	</div>
</div>

<?php include_once('layouts/footer.php'); ?>