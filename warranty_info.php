
<?php
$_info = get_warranty_info($_SESSION['war_id']);
?>




<div class="container">
		<div class="col-md-12">
			<table class="table row"> 
				<thead>

					<th>Warranty ID </th>
					<th>Sale ID</th>
					<th>Product name</th>
					<th>Warranty </br>(Years)</th>
					<th>Warranty</br>(Days)</th>
					<th>Sale date</th>
					<th>Remaining</br> Days</th>
					<th>Remaining </br> Years</th>
				</thead>
				<tr class="table-success">
					<td><?php echo $_SESSION['war_id'];?></td>
					<td><?php echo $_info['sal_id'];?></td>
					<td><?php echo $_info['name'];?></td>
					<td><?php echo $_info['warranty_yr'];?></td>
					<td><?php echo $_info['warranty_yr']*365;?></td>

					<td><?php echo $_info['sale_date'];?></td>
					<td><?php echo $_SESSION['days'];?></td>
					<td><?php echo round($_SESSION['days']/365, 2);?></td>
				</tr> 
			</table>
		</div>
	</div>

</div>
