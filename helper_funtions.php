<?php

$errors = array();

function sale_report_all_products()
{
  $query = "SELECT Distinct product.pro_id, product.name as p_name, quantity, sale.sal_id, sale_date, customer.name as c_name from product, customer, sale, sale_product";

  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);
  $results = array();
  while ($row = mysqli_fetch_array($result)) 
    $results[] = $row;
  return $results;
}

function authenticate($username, $password, $role)
{
  global $conn;
  $query  = sprintf("SELECT * FROM `authentication` WHERE user_name = '%s' and password = '%s' LIMIT 1", $username, $password);
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  $rows = $result->num_rows;


// print_r($rows);
// echo " user: ".$username;
// echo " Pass".$password;
// echo " Role".$role;
  if($rows == 1)
  {
    if($username == 'admin')
    {
     if($role =='Admin')return True;
     else return False;
   }

   else if($role=='Employee')return True;
   else return false;
 }
 else return False;
}

function remove_junk($str){
  $str = nl2br($str);
  $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
  return $str;
}


function validate_fields($var){
  global $errors;
  foreach ($var as $field) {
    $val = remove_junk($_POST[$field]);
    if(isset($val) && $val==''){
      $errors = $field ." can't be blank.";
      return $errors;
    }
  }
}

function redirect($url, $permanent = false)
{
  if (headers_sent() === false)
  {
    header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
  }

  exit();
}


function get_product_id( $old_id, $cat_id, $bra_id)
{

  $numeric_part = substr($old_id, 9);
  $id = filter_var($numeric_part, FILTER_SANITIZE_NUMBER_INT);
  $new_id = strval($id + 1);
  $new_id = sprintf('%06d', $new_id);
  return 'PRO'.$cat_id.$bra_id.$new_id;
}

function add_new_product($p_name, $p_brand,$p_category,$purchase_price,$sale_price,$warranty_yr)
{

  $old_id =  get_last_entry_primary_key('product', 'pro_id');

  $cat_id = substr($p_category, 3);
  $bra_id = substr($p_brand, 3);

  $p_id = get_product_id($old_id, $cat_id, $bra_id);
  // echo "PROID: ". $p_id.'<br>';
  global $conn;
  $query  = sprintf("INSERT INTO product (pro_id, name, cat_id, bra_id, purchase_price,sale_price,warranty_yr) VALUES ('%s', '%s','%s','%s',%d, %d, %s)",$p_id, $p_name, $p_category, $p_brand, $purchase_price,$sale_price,$warranty_yr);

  // echo $query;
  $result = $conn->query($query);
  if (!$result) die($conn->error);

  $query  = sprintf("INSERT INTO `stock` (`pro_id`, `quantity`) VALUES  ('%s', %d)", $p_id,0);
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  
}





function add_new_supplier($s_name, $s_address,$s_contact,$s_email)
{
  global $conn;
  $query = "select sup_id from supplier order by sup_id desc limit 1";
  $result = $conn->query($query);
  if (!$result)die($conn->error);

  $old_sup_id = mysqli_fetch_array($result);
  $old_sup_id = $old_sup_id['sup_id'];

  $new_sup_id = get_incremented_id($old_sup_id, 4);
  $sql = sprintf("INSERT INTO supplier (sup_id,company_name,address,contact_no,email) VALUES ('%s','%s','%s','%s','%s')",$new_sup_id, $s_name, $s_address, $s_contact, $s_email);
  $result = mysqli_query($conn,$sql);
  
  if (!$result)die($conn->error);
}


function add_new_category($name)
{

  global $conn;
  $query = "select cat_id from product_category order by cat_id desc limit 1";
  $result = $conn->query($query);
  if (!$result)die($conn->error);
  $old_cat_id = mysqli_fetch_array($result);
  $new_cat_id = get_incremented_id($old_cat_id['cat_id'], 3);
  $sql = sprintf("INSERT INTO product_category (cat_id,name) VALUES ('%s','%s')",$new_cat_id, $name);
  $result = mysqli_query($conn,$sql);
  
  if (!$result)die($conn->error); 
}
function add_new_brand($name)
{
  global $conn;
  $query = "select bra_id from product_brand order by bra_id desc limit 1";
  $result = $conn->query($query);
  if (!$result)die($conn->error);
  $old_bra_id = mysqli_fetch_array($result);
  $new_bra_id = get_incremented_id($old_bra_id['bra_id'], 3);
  $sql = sprintf("INSERT INTO product_brand (bra_id,name) VALUES ('%s','%s')",$new_bra_id, $name);
  $result = mysqli_query($conn,$sql); 
  if (!$result)die($conn->error); 
}
function list_of_products_in_stock(){
  $sql = 'SELECT product.`pro_id`, product.name, product_category.name as category, product_brand.name as brand, quantity, purchase_price, sale_price, warranty_yr FROM (((`product` INNER JOIN stock on product.pro_id=stock.pro_id) inner join product_category on product.cat_id=product_category.cat_id) INNER JOIN product_brand on product.bra_id=product_brand.bra_id)';
  global $conn;

  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);
  
  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}

function sales_report_from_to($from, $to)
{
  $sql = "SELECT * from sale where sale_date between '$from' and '$to'";
  global $conn;
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}



function purchases_report_from_to($from, $to)
{
  $sql = "SELECT * from purchase where purchase_date between '$from' and '$to'";
  global $conn;
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}


// only products without quantity
function list_of_products_only(){
  $sql  ="SELECT * from `product`";
  global $conn;

  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);
  
  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}

function find_product_by_id($id){
  $sql  ="SELECT * from `product` where `pro_id`=$id LIMIT 1";
  global $conn;

  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);
  
  $results = mysqli_fetch_array($result);
  if (!$result) die($conn->error);

  return $results;
}




function get_incremented_id( $old_id, $numeric_len)
{
  $prefix = substr($old_id, 0, 3);
  $id = filter_var($old_id, FILTER_SANITIZE_NUMBER_INT);
  $new_id = strval($id + 1);
  $speci = sprintf("%s%dd", "%0", $numeric_len);
  $new_id = $prefix.sprintf($speci, $new_id);

  return $new_id;
}

function get_last_entry_primary_key($table_name, $primary_key)
{
  global $conn;
  $query = sprintf("select `%s` from `%s` order by `%s` desc limit 1", $primary_key, $table_name, $primary_key);
  // echo "table_name ".$table_name." P Key ".$primary_key.'<br>';
  $result = $conn->query($query);
  if (!$result)die($conn->error);
  $key = mysqli_fetch_array($result);
  $key = $key[$primary_key];
  // echo "table_name ".$table_name."Key ".$key.'<br>';

  return $key;
}

function add_new_customer($c_name, $c_address,$c_contact,$c_email)
{
  global $conn;
  $query = "select cus_id from customer order by cus_id desc limit 1";
  $result = $conn->query($query);
  if (!$result)die($conn->error);
  
  $old_cus_id = mysqli_fetch_array($result);
  $old_cus_id = $old_cus_id['cus_id'];

  $new_cus_id = get_incremented_id($old_cus_id,4);
  $sql = sprintf("INSERT INTO customer (cus_id,name,address,contact_no,email) VALUES ('%s','%s','%s','%s','%s')",$new_cus_id, $c_name, $c_address, $c_contact, $c_email);
  $result = mysqli_query($conn,$sql);
  
  if (!$result)die($conn->error);
}



function add_new_employee($e_name, $e_address,$e_contact,$e_email)
{
  global $conn;
  $query = "select emp_id from employee order by emp_id desc limit 1";
  $result = $conn->query($query);
  if (!$result)die($conn->error);

  $old_emp_id = mysqli_fetch_array($result);
  $old_emp_id = $old_emp_id['emp_id'];

  $new_emp_id = get_incremented_id($old_emp_id,4);
  $sql = sprintf("INSERT INTO employee (emp_id,name,address,contact_no,email) VALUES ('%s','%s','%s','%s','%s')",$new_emp_id, $e_name, $e_address, $e_contact, $e_email);
  echo "$sql";
  $result = mysqli_query($conn,$sql);
  
  if (!$result)die($conn->error);

}
function list_of_supplier_by_id($id)
{
 $sql  ="SELECT `supplier`.`company_name` as sup_name FROM `order`,`supplier` WHERE `order`.`ord_id`='$id' AND `supplier`.`sup_id`=`order`.`sup_id`";
 global $conn;

 $result = mysqli_query($conn,$sql);
 if (!$result) die($conn->error);
 $row = mysqli_fetch_array($result);
 return $row[0];
}

function list_of_warranty_id(){
  global $conn;
  $sql  ="SELECT war_id from warranty";
  $result = mysqli_query($conn,$sql);

  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}


function list_of_suppliers(){
  global $conn;
  $sql  ="SELECT * from supplier";
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}

function list_of_latest_products(){
  global $conn;
  $sql  ="SELECT pro_id, p_name, b_name, sale_price from `product_category_brand` ORDER BY pro_id DESC LIMIT 5";
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  while ($row = mysqli_fetch_array($result)) 
    $results[] = $row;

  return $results;
}

function list_of_latest_sales()
{
  global $conn;
  $sql  ="SELECT name, sale_date, quantity*sale_price as amount from `sale`, `sale_product`, product WHERE product.pro_id=sale_product.pro_id and sale_product.sal_id=sale.sal_id  order by sale_date desc limit 5";
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  $results = array();  
  while ($row = mysqli_fetch_array($result)) 
  {  
    $results[] = $row;
  }
  return $results;
}


function list_of_most_quantity_sales()
{
  global $conn;
  $sql  ="SELECT product.pro_id, sum(quantity) as total_quantity, name FROM `sale_product`,product where `product`.`pro_id`=`sale_product`.`pro_id`GROUP BY pro_id  order by total_quantity desc LIMIT 5";
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  $results = array();  
  while ($row = mysqli_fetch_array($result)) 
  {  
    $results[] = $row;
  }
  return $results;
}

function list_of_customers(){

  global $conn;
  $sql  ="SELECT * from `customer`";
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;

  }
  return $results;
}


function list_of_order_ids(){
  $sql  ="SELECT ord_id,sup_id FROM `order` ORDER BY ord_id";
  global $conn;

  $result = mysqli_query($conn,$sql);

  if (!$result) die($conn->error);

  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}



function insert_into_order($sup_id, $products)
{
  $old_id = get_last_entry_primary_key("order", "ord_id");
  $ord_id = get_incremented_id($old_id, 7);
  global $conn;
  $sql = sprintf("INSERT INTO `order` (`ord_id`,`order_date`, `sup_id`) VALUES ('$ord_id',CURDATE(),'$sup_id')");

  $result = mysqli_query($conn, $sql);
  if (!$result) die($conn->error);

  $_SESSION['order_id'] = $ord_id;
  $_SESSION['sup_id'] = $sup_id;

  foreach ($products as $p_id=>$val)
  {
    $quantity = $val['quantity'];


    $sql = sprintf("INSERT INTO `ordered_product` (`ord_id`, `pro_id`, `quantity`) VALUES ('%s','%s',%d)", $ord_id, $p_id, $quantity);

    $result = mysqli_query($conn, $sql);
    if (!$result) die($conn->error);
  }

}

function insert_into_sale_and_stock($cus_id, $products)
{
  global $conn;
  $key = get_last_entry_primary_key('sale', 'sal_id');
  $new_id = get_incremented_id($key,7);
  $sql = "INSERT INTO `sale` (`sal_id`,`cus_id`, `sale_date`) VALUES ('$new_id', '$cus_id', CURDATE())";
  $result = mysqli_query($conn, $sql);
  if (!$result) die($conn->error);

  $_SESSION['sal_id'] = $sal_id = $new_id;

  $total = 0;
  foreach ($products as $p_id=>$val)
  {
    // get product sale price
    $sql = "SELECT sale_price from `product` WHERE '$p_id' = `pro_id`";
    $result = mysqli_query($conn, $sql);
    if (!$result) die($conn->error);
    $quantity = $val['quantity'];

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $total = $total + ($row['sale_price']*$quantity);
      }
    }
    else echo "product NOT Found";

    // echo $p_id." ".$quantity."<br/>";
    $sql = sprintf("INSERT INTO `sale_product` (`sal_id`, `pro_id`, `quantity`) VALUES ('%s','%s',%d)", $sal_id, $p_id, $quantity);
    $result = mysqli_query($conn, $sql);
    if (!$result) die($conn->error);

    $sql  = "UPDATE `stock` SET `quantity`=(`quantity` - $quantity) WHERE '$p_id' = pro_id";
    $result = mysqli_query($conn, $sql);
    if (!$result) die($conn->error);
  }
// //  echo "Total: ".$total;
//   $typ = "Sale";
//   $sql = sprintf("INSERT INTO `transactions` (`type`, `sal_id`, `amount`) VALUES ('sale',%d, %d)", $sal_id, $total);
//   $result = mysqli_query($conn, $sql);
//   if (!$result) die($conn->error);


}



function insert_into_warranty($products)
{
  global $conn;
  foreach ($products as $p_id => $val)
  {

    $key = get_last_entry_primary_key('warranty', 'war_id');
    $war_id = get_incremented_id($key, 8);
    $quantity = $val['quantity'];

    for ($i = 1; $i<=$quantity; $i++)
    {
      $key = get_last_entry_primary_key('warranty', 'war_id');
      $war_id = get_incremented_id($key, 8);

      $sql = sprintf("INSERT INTO `warranty` (`war_id`,`sal_id`, `pro_id`) VALUES ('%s', '%s','%s')",$war_id, $_SESSION['sal_id'], $p_id);
      $result = mysqli_query($conn, $sql);
      if (!$result) die($conn->error);
    }
  }

}
function insert_into_purchase($ord_id)
{
  global $conn;

  $key = get_last_entry_primary_key('purchase', 'pur_id');
  $new_id = get_incremented_id($key, 7);

// sdferf

  $sql = "INSERT INTO `purchase` (`pur_id`, `ord_id`, `purchase_date`) VALUES ('$new_id','$ord_id', CURDATE())";
  $result = mysqli_query($conn, $sql);
  if (!$result) die($conn->error);

  $_SESSION['pur_id'] = $pur_id = $new_id;


  $sql  = "SELECT `product`.`pro_id` as pro_id, quantity FROM `ordered_product`, `product` where `ordered_product`.`ord_id`='$ord_id' and `ordered_product`.`pro_id`=`product`.`pro_id`";
  


  $result_ = mysqli_query($conn,$sql);
  if (!$result_) die($conn->error);
  $total = 0;

  while ($row = mysqli_fetch_array($result_)) 
  {

  // get product purchase price
    $sql = sprintf("SELECT purchase_price from `product` WHERE '%s' = `pro_id`", $row['pro_id']);
    

    $result = mysqli_query($conn, $sql);
    if (!$result) die($conn->error);

    if ($result->num_rows > 0) {
      while($row_ = $result->fetch_assoc()) {
        $total = $total + ($row['quantity']*$row_['purchase_price']);
      }
    }
    else echo "product NOT Found";  
    $sql = sprintf("INSERT INTO `purchased_product` (`pur_id`, `pro_id`, `quantity`) VALUES ('%s','%s',%d)", $pur_id, $row['pro_id'], $row['quantity']);


    $r = mysqli_query($conn,$sql);
    if (!$r) die($conn->error);
  }

  // $typ = "Purchase";
  // $sql = sprintf("INSERT INTO `transactions` (`type`, `pur_id`, `amount`) VALUES ('%s',%d, %d)",$typ, $pur_id, $total);
  // $result = mysqli_query($conn, $sql);
  // if (!$result) die($conn->error);

}
function list_of_ordered_products($ord_id)
{


  $sql  = "SELECT `product`.`pro_id`, `name`, `purchase_price`, `sale_price`, quantity FROM `ordered_product`, `product` where `ordered_product`.`ord_id`='$ord_id' and `ordered_product`.`pro_id`=`product`.`pro_id`";
  global $conn;

  $result = mysqli_query($conn,$sql);

  if (!$result) die($conn->error);

  $results = array();
  while ($row = mysqli_fetch_array($result))
  {
    $results[] = $row;
  }
  return $results;
}



function list_of_lowest_quantity_Products()
{
  $sql  = "SELECT product.pro_id, name, quantity from product,stock where product.pro_id=stock.pro_id ORDER BY quantity asc";
  global $conn;

  $result = mysqli_query($conn,$sql);

  if (!$result) die($conn->error);

  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}


function add_to_stock($ord_id)
{
  global $conn;

  $sql  = "SELECT `product`.`pro_id` as pro_id, quantity FROM `ordered_product`, `product` where `ordered_product`.`ord_id`='$ord_id' and `ordered_product`.`pro_id`=`product`.`pro_id`";
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  while ($row = mysqli_fetch_array($result)) {
    $sql  = "UPDATE `stock` SET `quantity`=(`quantity` + $row[quantity]) WHERE '$row[pro_id]' = pro_id";
    $r = mysqli_query($conn,$sql);
    if (!$r) die($conn->error);

  }
}


function remaing_days($war_id)
{
  global $conn;

  $sql  = "SELECT warranty_yr FROM `warranty`, `product` where `warranty`.`war_id`= '$war_id' and `warranty`.`pro_id`=`product`.`pro_id`";
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);
  while ($row = mysqli_fetch_array($result)) {
    $warranty_yr = $row['warranty_yr'];
  }
  $sql  = "SELECT sale_date FROM `warranty`, `sale` where `warranty`.`war_id`= '$war_id' and `warranty`.`sal_id`=`sale`.`sal_id`";
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);
  while ($row = mysqli_fetch_array($result)) {
    $sale_date = $row['sale_date'];
  }



  return days_difference($sale_date, $warranty_yr);
}


function days_difference($sale_date, $warranty_yr)
{
  $curr_timestamp = date('Y-m-d');

  $time_difference = strtotime($curr_timestamp) - strtotime($sale_date);
// echo $curr_timestamp."<br>";

  $seconds_per_day =24*60*60;
  $days = round($time_difference / $seconds_per_day);
  // echo $days;
  $rem_days = $warranty_yr*365 - $days;
  return $rem_days;
}

function get_warranty_info($war_id)
{
  $query= "SELECT name, sale_date, `warranty`.`sal_id` as sal_id, `warranty_yr` FROM warranty, sale, sale_product,product WHERE `warranty`.`war_id`= '$war_id' and `warranty`.`sal_id` = `sale`.`sal_id` and `sale_product`.`sal_id` = `sale`.`sal_id` and `product`.`pro_id`=`sale_product`.`pro_id`";
  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);

  $row = mysqli_fetch_array($result);
  if (!$row) die($conn->error);
  return $row;
}

function get_products_by_id($pro_id)

{
  global $conn;
  $query = "SELECT sale_product.pro_id, product.name, warranty_yr, sale_date, sale.sal_id, war_id from warranty, sale_product, sale, product where `sale_product`.`pro_id` = '$pro_id' and `sale_product`.`pro_id`= `product`.`pro_id` and warranty.pro_id='$pro_id' and warranty.sal_id=sale_product.sal_id and sale.sal_id=sale_product.sal_id";
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);

  $results = array();

  while ($row = mysqli_fetch_array($result)) 
    $results[] = $row;  
  return $results;
}




function  update_product_by_id($p_id, $p_name, $p_brand,$p_category, $purchase_price,$sale_price,$warranty_yr)
{
 $query  = "UPDATE product SET";
 $query .=" `name` ='{$p_name}', ";
 $query .=" brand ='{$p_brand}', ";
 $query .=" category ='{$p_category}', ";
 $query .=" purchase_price ='{$purchase_price}', ";
 $query .=" sale_price ='{$sale_price}', ";
 $query .=" warranty_yr ='{$warranty_yr}' ";
 $query .= "WHERE `pro_id`=$p_id";

 global $conn;
 $result = mysqli_query($conn,$query);
 if (!$result) die($conn->error);
 redirect('stock_products.php');
}






function test_text_input($text)
{
  $text = trim($text);

  preg_match('/^[A-Za-z\W]+$/', $text , $matches, PREG_OFFSET_CAPTURE);
  
  if(empty($matches))$text = "";
  
  return $text;
}



function list_of_data($table_name)
{
  global $conn;
  $query = "select * from $table_name";
  $result = mysqli_query($conn, $query);
  if (!$result) die($conn->error);


  $results = array();
  while ($row = mysqli_fetch_array($result)) 
    $results[] = $row;  
  return $results;

}



function generate_report($table_name, $from, $to)
{
  $date_field_name = $table_name."_date";
  $sql = "SELECT * from `$table_name` where $date_field_name between '$from' and '$to'";
  global $conn;
  $result = mysqli_query($conn,$sql);
  if (!$result) die($conn->error);

  $results = array();
  while ($row = mysqli_fetch_array($result)) {
    $results[] = $row;
  }
  return $results;
}


function get_profit($sal_id)
{
  $profit = 0;
  global $conn;

  $query = "SELECT pro_id, quantity from sale_product WHERE sal_id='$sal_id'";
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);

  $products = array();
  while ($row = mysqli_fetch_array($result)) {
    $products[] = $row;
  }
  foreach ($products as $product) {
    $pro_id = $product['pro_id'];  
    $query = "SELECT purchase_price, sale_price from product WHERE pro_id='$pro_id'";
    $result = mysqli_query($conn, $query);
    if (!$result) die($conn->error);
    $prices = mysqli_fetch_array($result);
    $profit = $profit + ($prices['sale_price'] - $prices['purchase_price'])* $product['quantity'];
  }

  return $profit;
}

function get_customer_name($cus_id)
{
  $query = "SELECT `name` FROM `customer` WHERE cus_id = '$cus_id' LIMIT 1";

  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);

  $name = mysqli_fetch_array($result);
  return $name['name'];
  

}

function get_supplier_company_name($sup_id)
{
  $query = "SELECT `company_name` FROM `supplier` WHERE sup_id = '$sup_id' LIMIT 1";

  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);

  $name = mysqli_fetch_array($result);
  return $name['company_name'];
  

}



function get_quantity_by_sale_id($sal_id)
{
  $query = "SELECT sum(quantity) as total from sale_product WHERE sal_id='$sal_id'";
  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);
  $total = mysqli_fetch_array($result);
  return $total['total'];
}

function get_quantity_by_order_id($ord_id)
{
  $query = "SELECT sum(quantity) as total from ordered_product WHERE ord_id='$ord_id'";
  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);
  $total = mysqli_fetch_array($result);
  return $total['total'];
}

function sale_report($results)
{
  $info = array();
  foreach ($results as $result) {
    $row = array();
    $row[] = $result['sal_id'];
    $row[] = $result['sale_date'];
    $row[] = get_customer_name($result['cus_id']);    
    $row[] = get_quantity_by_sale_id($result['sal_id']);    
    $row[] = get_profit($result['sal_id']);    
    $info[] = $row;
  }
  return $info;
}


function order_report($results)
{
 $info = array();
 foreach ($results as $result) 
 {
  $row = array();
  $row[] = $result['ord_id'];
  $row[] = $result['order_date'];
  $row[] = get_supplier_company_name($result['sup_id']);    
  $row[] = get_quantity_by_order_id($result['ord_id']);    
  $info[] = $row;
}
return $info; 
}


function get_supplier_company_name_by_order_id($ord_id)
{
  $query = "SELECT `sup_id` FROM `order` WHERE ord_id = '$ord_id' LIMIT 1";

  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);
  $sup_id = mysqli_fetch_array($result);

  return get_supplier_company_name($sup_id['sup_id']);
}


function purchase_report($results)
{
 $info = array();
 foreach ($results as $result) {
  $row = array();
  $row[] = $result['pur_id'];
  $row[] = $result['purchase_date'];
  $row[] = get_supplier_company_name_by_order_id($result['ord_id']);    
  $row[] = get_quantity_by_order_id($result['ord_id']);    
  $info[] = $row;
}




return $info; 
}

function rows_in_table($t_name)
{

 $sql  ="SELECT * from `$t_name`";
 global $conn;
 $result = mysqli_query($conn,$sql);
 if (!$result) die($conn->error);
 $results = array();
 while ($row = mysqli_fetch_array($result)) 
  $results[] = $row;
return $results;
}




function get_id_from_str($str)
{
  $id=  explode(" ",$str);
  return $id[0];
}

function get_products_by_ids($pro_id, $cat_id, $bra_id, $warranty_yr)
{

 if($pro_id == "All" && $cat_id == "All" && $bra_id == "All")
  $query = "SELECT pro_id, product.name as p_name, product_category.name as c_name, product_brand.name as b_name, warranty_yr, sale_price, purchase_price from ((product left OUTER JOIN product_category on product.cat_id=product_category.cat_id) left OUTER JOIN product_brand ON product.bra_id=product_brand.bra_id)";


if($pro_id == "All" && $cat_id == "All" && $bra_id != "All")
  $query = "SELECT pro_id, product.name as p_name,product_category.name as c_name, product_brand.name as b_name, warranty_yr, sale_price, purchase_price from ((product left OUTER JOIN product_category on product.cat_id=product_category.cat_id) left OUTER JOIN product_brand ON product.bra_id=product_brand.bra_id) where product_brand.bra_id= '$bra_id'";


if($pro_id == "All" && $cat_id != "All" && $bra_id == "All")
  $query = "SELECT pro_id, product.name as p_name,product_category.name as c_name, product_brand.name as b_name, warranty_yr, sale_price, purchase_price from ((product left OUTER JOIN product_category on product.cat_id=product_category.cat_id) left OUTER JOIN product_brand ON product.bra_id=product_brand.bra_id) WHERE product_category.cat_id = '$cat_id'";

if($pro_id == "All" && $cat_id != "All" && $bra_id != "All")
  $query = "SELECT pro_id, product.name as p_name,product_category.name as c_name, product_brand.name as b_name, warranty_yr, sale_price, purchase_price from ((product left OUTER JOIN product_category on product.cat_id=product_category.cat_id) left OUTER JOIN product_brand ON product.bra_id=product_brand.bra_id) where product_category.cat_id = '$cat_id' and product_brand.bra_id='$bra_id";


if($pro_id != "All")
  $query = "SELECT pro_id, product.name as p_name,product_category.name as c_name, product_brand.name as b_name, warranty_yr, sale_price, purchase_price from ((product left OUTER JOIN product_category on product.cat_id=product_category.cat_id) left OUTER JOIN product_brand ON product.bra_id=product_brand.bra_id) WHERE pro_id='$pro_id'";

global $conn;
$result = mysqli_query($conn,$query);
if (!$result) die($conn->error);
$results = array();
while ($row = mysqli_fetch_array($result)) 
{
  if($warranty_yr != 'Any')
  {
    if($warranty_yr ==$row['warranty_yr'])  
      $results[] = $row;

  }

  else $results[] = $row;

}
return $results;

}




function get_products_by_purchase_id($pur_id)
{
  $query = "SELECT purchased_product.pro_id, name, purchase_price, quantity from product, purchased_product where purchased_product.pur_id='$pur_id' and purchased_product.pro_id=product.pro_id
";
  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);
  $results = array();
  while ($row = mysqli_fetch_array($result)) 
    $results[] = $row;
  return $results;


}

function get_purchase_date($pur_id)
{
  $query ="SELECT purchase_date from purchase where pur_id='$pur_id'";
  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);
  $row = mysqli_fetch_array($result); 
  return $row[0];
}


function get_last_purchase_id()
{
  $query ="SELECT pur_id from purchase order by pur_id DESC LIMIT 1";
  global $conn;
  $result = mysqli_query($conn,$query);
  if (!$result) die($conn->error);
  $row = mysqli_fetch_array($result); 
  return $row[0];
}
?>


<!-- 
sessionStorage.SessionName = "SessionData" ,

sessionStorage.getItem("SessionName") and

sessionStorage.setItem("SessionName","SessionData");
 -->