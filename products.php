<?php 

if(isset($_GET['action']) && $_GET['action']=="add"){ 

    $id=$_GET['id']; 

    if(isset($_SESSION['cart'][$id])){ 

        $_SESSION['cart'][$id]['quantity']++; 

    }else{ 
      global $conn;
      $sql_s="SELECT * FROM product WHERE pro_id='$id'";

      $query_s=mysqli_query($conn,$sql_s); 
      if(mysqli_num_rows($query_s)!=0){ 
        $row_s=mysqli_fetch_array($query_s); 

        $_SESSION['cart'][$row_s['pro_id']]=array( 
            "quantity" => 1
        ); 


    }else{ 

        $message="This product id it's invalid!"; 

    } 

} 

} 

?> 

<div class="container">
    <div class="col-md-6">
    <h2>Product List</h2> 
        <table class="table table-striped"> 
            <tr> 
                <th>Product ID</th> 

                <th>Name</th> 
                <th>Unit Purchase </br> Price</th> 
                <th>Unit Sale </br>Price </th> 
                <th>Action</th> 
            </tr> 

            <?php 
            foreach ($_SESSION['order_products'] as $row ) {
                  

                ?> 
                <tr> 
                    <td><?php echo $row['pro_id'] ?></td> 

                    <td><?php echo $row['name'] ?></td> 
                    <td><?php echo $row['sale_price'] ?></td> 
                    <td><?php echo $row['purchase_price'] ?></td> 
                    <td><a  class="btn btn-info" href="order.php?page=products&action=add&id=<?php echo $row['pro_id'] ?>">Add to order list</a></td> 
                </tr> 
                <?php 

            } 

            ?> 

        </table>
    </div>
</div>
