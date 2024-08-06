
<?php
session_start();
include_once('../connection/connection.php');

  
    $id=$_GET['id'];
   

    $q="delete from news where news_id='$id'";
    
    
    
    
   $in= mysqli_query($conn, $q);
   
   
   if($in)
    {
          echo "<script> alert('News Update Deleted')</script>";
       
    }
    else if(!$in)
    {
       echo "<script> alert('News Update not deleted!')</script>";
         
    }
    
echo "<script>window.location.replace('product-detail.php')</script>";
    
            




?>