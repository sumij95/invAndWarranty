<?php 

if(isset($_GET['action']) && $_GET['action']=="add"){ 

    $id=($_GET['id']); 

    if(isset($_SESSION['cart'][$id]))
    { 

        $_SESSION['cart'][$id]['quantity']++; 

    }
    else
    { 
      global $conn;
      $sql_s="SELECT * FROM product WHERE pro_id='$id'";

      $query_s=mysqli_query($conn,$sql_s); 
      if(mysqli_num_rows($query_s)!=0)
      { 
        $row_s=mysqli_fetch_array($query_s); 

        $_SESSION['cart'][$row_s['pro_id']]=array("quantity" => 1);
    }
    else{ 

        $message="This product id it's invalid!"; 

    } 

} 

} 

?> 

<div class="container">
    <div class="col-md-6">
        <h2>Product List</h2> 

        <table class="table table-striped"> 
            <thead>
                <th> Name </th>
                <th> Quantity </br>in stock </th>
                <th> Unit Sale <br> Price </th> 
                <th> Action </th> 
            </thead>

            <?php 
            foreach ( $_SESSION['products'] as $row )
            { 

                if($row['quantity'] == 0 ) 
                {
                    //echo "0";
                    continue;
                }
                if(isset($_SESSION['cart'][$row['pro_id']]))
                {
                    // echo $row['pro_id'];
                    // echo " ";
                    // echo $_SESSION['pro_quantity'][$row['pro_id']];
                    // echo " ";
                    // echo $_SESSION['cart'][$row['pro_id']]['quantity'];
                    // echo " ";
                    // echo $row['quantity'];
                    // echo "<br>";
                    
                    if(($row['quantity'] - $_SESSION['cart'][$row['pro_id']]['quantity']) <= 0)continue;
                }
                ?> 
                <tr> 
                    <td><?php echo $row['name'] ?></td> 
                    <td><?php echo $row['quantity'] ?></td> 
                    <td><?php echo $row['sale_price'] ?></td> 
                    <td><a  class="btn btn-success" href="sale.php?page=sale_products&action=add&id=<?php echo $row['pro_id'] ?>">Add to order list</a></td> 
                </tr> 
                <?php 

            } 

            ?> 

        </table>
    </div>

    <div class="col-md-4">
    </div>

    <div class="col-md-4">
    </div>
</div>
