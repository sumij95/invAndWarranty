
<?php
$_infos = get_products_by_id($_SESSION['war_pro_id']);
?>



<script>
	function printDiv(divName) 
	{
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>

<div class="container">
	<div id="printable">
		<div class="col-md-12">
			<p><?php echo "Warranty for product ID: <b>".$_SESSION['war_pro_id']."</b>" ?></p>
			<table class="table "> 
				<thead class="thead-inverse">
					<th>Warranty ID </th>
					<th>Sale ID</th>
					<th>Product name</th>
					<th>Warranty </br>(Years)</th>
					<th>Warranty</br>(Days)</th>
					<th>Sale date</th>
					<th>Remaining</br> Days</th>
					<th>Remaining </br> Years</th>
				</thead>
				<?php foreach ($_infos as $_info) { ?>

				<tr class="table-success">
					<td><?php echo $_info['war_id'];?></td>
					<td><?php echo $_info['sal_id'];?></td>
					<td><?php echo $_info['name'];?></td>
					<td><?php echo $_info['warranty_yr'];?></td>
					<td><?php echo $_info['warranty_yr']*365;?></td>

					<td><?php echo $_info['sale_date'];?></td>
					<td><?php echo days_difference($_info['sale_date'],$_info['warranty_yr'] )?></td>
					<td><?php echo round(days_difference($_info['sale_date'],$_info['warranty_yr'])/365, 2);?></td>
				</tr> 
					
				<?php } ?>
			</table>
		</div>
	</div>
</div>
