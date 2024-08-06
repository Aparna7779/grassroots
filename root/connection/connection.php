

<?php
 $servername="localhost";
 $username="root";
 $password="";
 $db_name="agricommerce";
 $conn=mysqli_connect($servername,$username,$password,$db_name);
 if(!$conn){
  die("Connection falied:=".mysqli_connect.error());
 }
?>

