<?php include_once('layouts/header.php'); ?>
<?php include_once('layouts/nav.php'); ?>
<?php include_once('load.php'); ?>


<div class="col-md-8">
    <table class="table table-striped"> 
        <tr> 
            <th>Transaction ID</th> 
            <th>Type</th> 
            <th>Purchase ID</th> 
            <th>Sale ID</th> 
            <th>Total Amount</th>
        </tr> 

        <?php 
        global $conn;

        $sql="SELECT * FROM `transactions`"; 
        $query=mysqli_query($conn, $sql); 

        while ($row=mysqli_fetch_array($query)) { 
            ?> 
            <tr> 
                <td><?php echo $row['tra_id'] ?></td> 
                <td><?php echo $row['type'] ?></td>
                <td>
                    <?php 
                    if($row['pur_id'])echo $row['pur_id'];
                    else echo "-";
                    ?>

                </td>
                <td>
                    <?php
                    if($row['sal_id']) echo $row['sal_id'];
                    else echo "-"; ?></td>
                <td><?php echo $row['amount'] ?></td>
            </tr> 
            <?php 
        } 

        ?> 

    </table>
</div>