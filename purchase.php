<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<?php include_once('load.php'); ?>
<?php $suppliers = list_of_suppliers();?>
<?php $order_ids = list_of_order_ids();?>

<script>
  function show_supplier(str) {

    var x = document.getElementById("purchase_btn");
    if (x.style.display === "none") {
        x.style.display = "block";
    } 

    if (str == "") 
    {
      document.getElementById("sup_div").innerHTML = "";
      return;
    } 
    else 
    { 
      if (window.XMLHttpRequest) 
      {
        xmlhttp = new XMLHttpRequest();
      } 
      else 
      {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) 
    {
      document.getElementById("sup_div").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","get_supplier.php?q="+str,true);
  xmlhttp.send();
}
}
</script>


<div class="col-md-10">
  <div class="row">

    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Purchase Products</span>
        </strong>
      </div>
      <div class="panel-body">

       <div class="col-md-8">
        <form method="post" action="purchased_list.php" class="clearfix">
          <div class="form-group">
            <br>Order ID</br>
            <select class="form-control" name="ord_id" onchange="show_supplier(this.value)" >
              <option></option>
              <?php foreach ($order_ids as $order_id):?>
                <option ><?php echo ($order_id['ord_id']);?></option>
              <?php endforeach; ?>
            </select>
            <div id="sup_div"></div>
          </div>

          <button id="purchase_btn" type="submit" name="purchase_product" class="btn btn-danger" style="display: none;">purchase products</button>
        </form>
      </div>
    </div>
  </div>