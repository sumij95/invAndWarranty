<div class="col-md-2">
  <div class="row">
    <div class="panel panel-box clearfix">
      <div class="panel-icon pull-left bg-hom">
        <i class="glyphicon glyphicon-home"></i>
      </div>
      <div class="panel-value pull-right">
       <div class="dropdown">
        <a href="index.php">
          <button   class="dropbtn">Home</button>
        </a>
        <?php if(isset($_SESSION['username'])) echo "<p>Hi ".$_SESSION['username']." !</p>";?>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="panel panel-box clearfix">
    <div class="panel-icon pull-left bg-cus">
      <i class="glyphicon glyphicon-user"></i>
    </div>
    <div class="panel-value pull-right">
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Customer Support</button>
        <div id="myDropdown" class="dropdown-content">
          <a href="check_warranty.php">Check warranty</a>
          <a href="add_supplier.php">Add Supplier</a>
          <a href="add_customer.php">Add Customer</a>
          
          <!-- Admin role -->
          <?php

          if(isset($_SESSION['username']) && $_SESSION['username']=='admin')
            echo '<a href="add_employee.php">Add Employee</a>';
          ?>
          <a href="list_customers.php">List of Customers</a>
        </div>
      </div>

    </div>

  </div>
</div>
<div class="row">
  <div class="panel panel-box clearfix">
    <div class="panel-icon pull-left bg-pro">
      <i class="glyphicon glyphicon-shopping-cart"></i>
    </div>
    <div class="panel-value pull-right">
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Order & products</button>
        <div id="myDropdown" class="dropdown-content">

          <a href="add_products.php">Add New Product</a>
          <a href="order.php">Place Order</a>
          <a href="stock_products.php">Stock</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="panel panel-box clearfix">
    <div class="panel-icon pull-left bg-pur">
      <i class="glyphicon glyphicon-list"></i>
    </div>
    <div class="panel-value pull-right">
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Sales & Purchase</button>
        <div id="myDropdown" class="dropdown-content">

          <a href="purchase.php">Purchase Products</a>
          <a href="sale.php">Sale Products</a>
          <a href="transactions.php">Transaction</a>


        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="panel panel-box clearfix">
    <div class="panel-icon pull-left bg-sal">
      <i class="glyphicon glyphicon-stats"></i>
    </div>
    <div class="panel-value pull-right">
      <div class="dropdown">
        <a href="reports.php">
          <button   class="dropbtn">Report</button>
        </a>
      </div>
    </div>
  </div>  
</div>
<div class="row">
  <div class="panel panel-box clearfix">
    <div class="panel-icon pull-left bg-rep">
      <i class="glyphicon glyphicon-off"></i>
    </div>
    <div class="panel-value pull-right">
     <div class="dropdown">
      <a href="logout.php">
        <button   class="dropbtn">Logout</button>
      </a>
    </div>
  </div>
</div>  
</div>
</div>
