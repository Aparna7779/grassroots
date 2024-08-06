
<?php
session_start();
include_once('../connection/connection.php');

  
    $id=$_GET['id'];
   

    $q="delete from market_price where id='$id'";
    
    
    
    
   $in= mysqli_query($conn, $q);
   
   
   if($in)
    {
          echo "<script> alert('Entry Deleted')</script>";
       
    }
    else if(!$in)
    {
       echo "<script> alert('Entry not deleted!')</script>";
         
    }
    
echo "<script>window.location.replace('market_price.php')</script>";
    
            




?>