

<?php

include_once("connection/connection.php");

 if(isset($_POST["submit"]))
 {
     $select="select * from user_registration";
     $chk=mysqli_query($conn,$select);
     $m=mysqli_fetch_assoc($chk);
     if($_POST['registerUsername']==$m['username']||$_POST['registerEmail']==$m['email'])
     {
         echo "<script>alert('Username or email already exists')</script>";
        
         
         
     }
     else
         {
  $fname=$_POST['registerFname'];
  $utype=$_POST['usertype'];
  $lname=$_POST['registerLname'];
  $uname=$_POST['registerUsername'];
  $pass=$_POST['registerPassword'];
  $email=$_POST['registerEmail'];
  $c=$_POST['country'];
    $s=$_POST['state'];
      $sc=$_POST['statec'];
  $phone=$_POST['registerPhone'];
 $pin=$_POST['pin'];
 $city=$_POST['city'];
 $addr=$_POST['address'];
 $sql = "INSERT INTO `agricommerce`.`user_registration` (`f_name`, `l_name`, `username`, `password`, `email`, `country`, `state`, `state_code`,`city`,`pincode`, `phone`, `u_type`,`address`) VALUES('$fname','$lname','$uname','$pass','$email','$c','$s','$sc','$city','$pin','$phone','$utype','$addr')";

$row=mysqli_query($conn,$sql);
if($row)
{
   header("location:login.php");
 }
 else {
     echo "<script>alert('Account could not be created!Try again!')</script>";
     echo "<script>window.location.replace('register.html')</script>";
     
     
 }
}
 }
?>
