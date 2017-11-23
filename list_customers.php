<?php include_once('load.php'); ?>
<?php $customers = list_of_customers();?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<div class="col-md-4">
  <div class="row">
   <div class="col-md-12">
   </div>
   <!-- <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
       <div class="pull-right">
         <a href="add_products.php" class="btn btn-primary">Add New</a>
       </div> -->
     </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 10px;">Customer ID</th>
            <th class="text-center" style="width: 10%;"> Name </th>
            <th class="text-center" style="width: 10%;"> Address </th>
            <th class="text-center" style="width: 10%;"> Contact No </th>
            <th class="text-center" style="width: 10%;"> Email </th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($customers as $Customer):?>

            <tr>
              <td class="text-center"><?php echo $Customer['cus_id']?></td>
              <td> <?php echo ($Customer['name']); ?></td>
              <td class="text-center"> <?php echo ($Customer['address']); ?></td>
              <td class="text-center"> <?php echo ($Customer['contact_no']); ?></td>
              <td class="text-center"><?php echo ($Customer['email']); ?></td>
              

            </tr>
          <?php endforeach; ?>
        </tbody>
      </tabel>
    </div>
  </div>
</div>
</div>
</div>
