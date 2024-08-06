<?php
session_start();
$id=$_GET['pid'];
include_once('../../../connection/connection.php');

    $q="delete from product where p_id=$id";
    
    
    
    
   $in= mysqli_query($conn, $q);
   
   
   if($in)
    {
          echo "<script> alert('Product deleted!')</script>";
        
    }
    else if(!$in)
    {
       echo "<script> alert('Product could not be deleted!')</script>";
         
    }
    echo "<script>window.location.replace('data.php')</script>";
    
    
       
?>