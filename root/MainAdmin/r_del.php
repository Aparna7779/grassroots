
<?php
session_start();
include_once('../connection/connection.php');

  
    $id=$_GET['id'];
   

    $q="delete from reviews where r_id='$id'";
    
    
    
    
   $in= mysqli_query($conn, $q);
   
   
   if($in)
    {
          echo "<script> alert('Review Deleted')</script>";
       
    }
    else if(!$in)
    {
       echo "<script> alert('Review not deleted!')</script>";
         
    }
    
echo "<script>window.location.replace('product_reviews.php')</script>";
    
            




?>