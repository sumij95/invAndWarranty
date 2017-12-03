<?php include_once('load.php'); ?>
<?php $products = list_of_products();?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<div class="col-md-9">
  <div class="row">
   <div class="col-md-12">
   </div>
   <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
       <span>Product details and Stock status</span>
     </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;"> Product ID </th>

            <th> Product Title </th>
            <th class="text-center" style="width: 10%;"> Category </th>
            <th class="text-center" style="width: 10%;"> Brand </th>
            <th class="text-center" style="width: 10%;"> Unit Purchase <br> Price </th>
            <th class="text-center" style="width: 10%;"> Unit Sale <br> Price </th>
            <th class="text-center" style="width: 10%;"> Warranty (Year) </th>
            <th class="text-center" style="width: 10%;"> Quantity </th>
            <th class="text-center" style="width: 10%;"> Action </th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product):?>

            <tr>
              <td class="text-center"><?php echo $product['pro_id']?></td>
              <td> <?php echo ($product['name']); ?></td>
              <td class="text-center"> <?php echo ($product['category']); ?></td>
              <td class="text-center"> <?php echo ($product['brand']); ?></td>
              <td class="text-center"><?php echo ($product['purchase_price']); ?></td>
              <td class="text-center"><?php echo ($product['sale_price']); ?></td>
              <td class="text-center"><?php echo ($product['warranty_yr']); ?></td>

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
