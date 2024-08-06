<?php
session_start();

include_once("connection/connection.php");

if(isset($_POST["submit"])){

$uname = $_POST["loginUsername"];
$pass = $_POST["loginPassword"];
if($uname=="grassroots@admin"&&$pass=="adminid#$429*")
{
     $_SESSION['username']="grassroots@admin";
       $_SESSION['userid']="0";
        $_SESSION['usertype']="ADMIN";;
      
       
       echo "<script>alert('Login successful!');</script>";
      echo "<script>window.location.replace('MainAdmin/products.php');</script>";
    
}

else if($uname!="grassroots@admin"&&$pass!="adminid#$429*")
    

{
try{
$select = "SELECT * FROM `user_registration` where username='$uname' and password='$pass' ";
$r = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($r);

  
if($row['username'] ==$uname && $row['password'] ==$pass)
    {
        $_SESSION['username']= $row['username'];
        $_SESSION['userid']=$row['user_id'];
        $_SESSION['usertype']=$row['u_type'];
  
      if($row['u_type']==="VENDOR"){
        
        echo "<script>alert('Login successful!');</script>";
        echo "<script>window.location.replace('User/index.php');</script>";
    }
    else  if($row['u_type']==="CUSTOMER"){
       
        echo "<script>alert('Login successful!');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    }
  }
  else if($row['username'] != $uname && $row['password'] != $pass)
    {
echo "<script>alert('Username or Password incorrect!')</script>";
echo "<script>window.location.replace('login.php');</script>";

}

else
{
echo "<script>alert('Username or Password incorrect!');</script>";
echo "<script>window.location.replace('login.php');</script>";
}

}

catch(ErrorException $e) {
    echo "<script>alert('Username or Password incorrect!');</script>";
    echo "<script>window.location.replace('login.php');</script>";
}
}
}

?>
