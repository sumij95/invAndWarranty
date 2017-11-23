<?php include_once('load.php'); ?>
<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>

<?php $ids = list_of_warranty_id(); ?>
<?php 
$products = list_of_products();
if(isset($_POST['check']))
{
  $days = remaing_days($_POST['war_id']);
  if(!isset($_SESSION))session_start();
  $_SESSION['days'] = $days;
  $_SESSION['war_id'] = $_POST['war_id'];
}
if(isset($_POST['check_pro_id']))
{
  $_SESSION['war_pro_id'] = $_POST['pro_id'];
}
?>


<div class="col-md-10">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Warranty Check by warranty ID</span>
        </strong>
      </div>
      <div class="panel-body">
       <div class="col-md-12">
         <form method="post" action="check_warranty.php" class="clearfix">
          <div class="form-group">
            <select class="form-control" name="war_id">
              <?php foreach ($ids as $id):?>
                <option ><?php echo $id['war_id']; ?> </option>
              <?php endforeach; ?> 
            </select>
          </div>
          <button type="submit" name="check" class="btn btn-info">check</button>
          <button class=" pull-right"onclick="printDiv('printableWarID')"> Print</button>

        </form>
      </div>
    </div>
  </div>
</div>
<div class="row" id="printableWarID">
<?php if(isset($_SESSION['war_id']))require("warranty_info.php");
?>
</div>
<div class="row">
  <div class="panel panel-default">
    <div class="panel-heading">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Warranty Check of sold products By Product ID</span>
      </strong>
    </div>
    <div class="panel-body">
     <div class="col-md-10">
       <form method="post" action="check_warranty.php" class="clearfix">
        <div class="form-group">
          <select class="form-control" name="pro_id">
            <?php foreach ($products as $product):?>
              <option ><?php echo $product['pro_id']; ?> </option>
            <?php endforeach; ?> 
          </select>
        </div>
        <button type="submit" name="check_pro_id" class="btn btn-info">check</button>
        <button class=" pull-right"onclick="printDiv('printable')"> Print</button>
      </form>
    </div>
  </div>
</div>
</div>
<div class="row" id="printable" style="padding-top: 20px;">

  <?php if(isset($_SESSION['war_pro_id']))require("warranty_info_pro_id.php");
  ?>

</div>
</div>