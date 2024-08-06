
<?php
session_start();
include_once('../connection/connection.php');

  
    $id=$_GET['id'];
   

    $q="delete from orders where order_id='$id'";
    
    
    
    
   $in= mysqli_query($conn, $q);
   
   
   if($in)
    {
          echo "<script> alert('Order Deleted')</script>";
       
    }
    else if(!$in)
    {
       echo "<script> alert('Order not deleted!')</script>";
         
    }
    
echo "<script>window.location.replace('product-orders.php')";
    
            




?>