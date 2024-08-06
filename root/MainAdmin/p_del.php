
<?php
session_start();
include_once('../connection/connection.php');

  
    $id=$_GET['id'];
   

    $q="delete from product where p_id='$id'";
    
    
    
    
   $in= mysqli_query($conn, $q);
   
   
   if($in)
    {
          echo "<script> alert('Product Deleted')</script>";
       
    }
    else if(!$in)
    {
       echo "<script> alert('Product not deleted!')</script>";
         
    }
    
header("location:products.php");
    
            




?>