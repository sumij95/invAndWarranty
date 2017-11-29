<?php include_once('load.php'); ?>
<?php $suppliers = list_of_suppliers();?>

<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<div class="col-md-10">
  <div class="panel panel-default">

    <div class="panel-heading">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>List of Suppliers</span>
      </strong>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 10%;">supplier ID</th>
            <th class="text-center" style="width: 30%;"> Company Name </th>
            <th class="text-center" style="width: 30%;"> Address </th>
            <th class="text-center" style="width: 20%;"> Contact No </th>
            <th class="text-center" style="width: 10%;"> Email </th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($suppliers as $supplier):?>

            <tr>
              <td class="text-center"><?php echo $supplier['sup_id']?></td>
              <td> <?php echo ($supplier['company_name']); ?></td>
              <td class="text-center"> <?php echo ($supplier['address']); ?></td>
              <td class="text-center"> <?php echo ($supplier['contact_no']); ?></td>
              <td class="text-center"><?php echo ($supplier['email']); ?></td>


            </tr>
          <?php endforeach; ?>
        </tbody>
      </tabel>
    </div>
  </div>
</div>
</div>