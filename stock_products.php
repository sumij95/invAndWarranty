<?php include_once('load.php'); ?>
<?php $products = list_of_products_in_stock();?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<div class="col-md-9">
  <div class="row">
   <div class="col-md-12">
   </div>
   <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
<span>Product information and stock status</span>
     </strong>
     </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <!-- <thead style="background:#A000C7; color:#FFF"> -->
        <thead>
            <th class="text-center" style="width: 50px;"> Product ID</th>
            <th> Product Name </th>
            <th class="text-center" style="width: 10%;"> Category </th>
            <th class="text-center" style="width: 10%;"> Brand </th>
            <th class="text-center" style="width: 10%;"> Unit Purchase <br> Price </th>
            <th class="text-center" style="width: 10%;"> Unit Sale <br> Price </th>
            <th class="text-center" style="width: 10%;"> Quantity </th>
            <th class="text-center" style="width: 10%;"> Action </th>

        </thead>
        <tbody>
          <?php foreach ($products as $product):
          if($product['quantity'] <10)
          {
              echo '<tr style="background:red; color:white">';
          }
          else echo "<tr>";

          ?>

            
              <td class="text-center"><?php echo $product['pro_id']?></td>
              <td> <?php echo ($product['name']); ?></td>
              <td class="text-center"> <?php echo ($product['category']); ?></td>
              <td class="text-center"> <?php echo ($product['brand']); ?></td>
              <td class="text-center"><?php echo ($product['purchase_price']); ?></td>
              <td class="text-center"><?php echo ($product['sale_price']); ?></td>
              
              <td class="text-center"><?php echo ($product['quantity']); ?></td>

              <td class="text-center">
                <div class="btn-group">
                  <a href="edit_product.php?id=<?php echo (int)$product['pro_id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>

                </div>
              </td>


            </tr>
          <?php endforeach; ?>
        </tbody>
      </tabel>
    </div>
  </div>
</div>
</div>
</div>
