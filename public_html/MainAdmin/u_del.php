
<?php
session_start();
include_once('../connection/connection.php');

  
    $id=$_GET['id'];
   

    $q="delete from user_registration where user_id='$id'";
    
    
    
    
   $in= mysqli_query($conn, $q);
   
   
   if($in)
    {
          echo "<script> alert('User Removed!')</script>";
       
    }
    else if(!$in)
    {
       echo "<script> alert('User not deleted!Error occured')</script>";
         
    }
    
    echo"<script> window.location.replace('location:reg-users.php')</script>";
    
            




?>