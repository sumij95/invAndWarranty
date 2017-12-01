<?php include_once('load.php'); ?>

</head>
<body>

	<?php
	$q = intval($_GET['q']);
	$supplier_name = list_of_supplier_by_id($q);
	echo '<h4><br>Supplier Company name: ';
	
	echo $supplier_name;
	echo '</br></h4>';
	
	?>

	<?php $products = list_of_ordered_products(($_GET['q']));?>

	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center" style="width: 50px;"> Product ID </th>
					<th class="text-center" style="width: 50px;"> Product Name </th>
					<!-- <th> Product Name </th> -->
					<th class="text-center" style="width: 10%;"> Unit Purchase <br> Price </th>
				    <th class="text-center" style="width: 10%;"> Quantity </th>
					<th class="text-center" style="width: 10%;"> Total Purchase <br> Price </th>


				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $product):?>

					<tr>
						<td class="text-center"><?php echo $product['pro_id']?></td>
						<td> <?php echo ($product['name']); ?></td>
						<td class="text-center"> <?php echo ($product['purchase_price']); ?></td>
						<td class="text-center"> <?php echo ($product['quantity']); ?></td>
						<td class="text-center"> <?php echo ($product['quantity']*$product['purchase_price']); ?></td>


						
					</tr>
				<?php endforeach; ?>
			</tbody>
		</tabel>
	</div>
</body>
</html>