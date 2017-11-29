  <?php 
  
  
  if(isset($_POST['submit'])){ 
      
    foreach($_POST['quantity'] as $key => $val) { 
        if($val==0) { 
            unset($_SESSION['cart'][$key]); 
        }else{ 
            $_SESSION['cart'][$key]['quantity']=$val; 
        } 
    } 
} 

?> 

<h1>View cart</h1> 

<a class="btn btn-warning" href=<?php echo basename($_SERVER['PHP_SELF'])."?page=products"?> >Go back to the products page.</a> 
<form method="post" action=<?php echo basename($_SERVER['PHP_SELF'])."?page=cart"?>> 
  
    <table> 
      
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 

        </tr> 
        
        <?php 
        
        $sql="SELECT * FROM product WHERE pro_id IN ("; 
        
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.="'".$id."',";
        } 
        global $conn;
        $sql=substr($sql, 0, -1).") "; 
        $query=mysqli_query($conn,$sql); 
        $totalprice=0; 
        while($query && $row=mysqli_fetch_array($query)){ 
            $subtotal=$_SESSION['cart'][$row['pro_id']]['quantity']; 
            $totalprice+=$subtotal; 
            ?> 
            <tr> 
                <td><?php echo $row['name'] ?></td> 
                <td><input type="text" name="quantity[<?php echo $row['pro_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['pro_id']]['quantity'] ?>" /></td> 
            </tr> 
            <?php 
            
        } 
        ?> 
        <tr> 
            <td colspan="4">Total Number of products: <?php echo $totalprice ?></td> 
        </tr> 
        
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To remove an item set its quantity to 0. </p>