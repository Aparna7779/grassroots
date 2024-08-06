

<?php

session_start();

    
    $id=$_SESSION['userid'];
    include_once("connection/connection.php");

    if (isset($_POST["submit"])) {
        $select = "select * from user_registration where user_id='$id'";
        $chk = mysqli_query($conn, $select);
        $m = mysqli_fetch_assoc($chk);
        $passw=$m['password'];
        $cm = $m['country'];
         $sm = $m['state'];
      
            $fname = $_POST['registerFname'];
           
            $lname = $_POST['registerLname'];
            $uname = $_POST['registerUsername'];
            if(empty( $_POST['confirmPassword']))
            {
                $pass=$passw;
            }
            else if(!empty( $_POST['confirmPassword'])){
                $pass = $_POST['confirmPassword'];
            }
            
            $email = $_POST['registerEmail'];
             if(empty( $_POST['country']))
            {
                $c=$cm;
            }
            else if(!empty( $_POST['country'])){
             $c = $_POST['country'];
            }
             if(empty( $_POST['state']))
            {
                $s=$sm;
            }
            else if(!empty( $_POST['state'])){
             $s = $_POST['state'];
            }
            
           $add=$_POST['add'];
            $sc = $_POST['statec'];
            $phone = $_POST['registerPhone'];
            $pin = $_POST['pin'];
            $city = $_POST['city'];
            $sql = "update user_registration set f_name='$fname',l_name='$lname',username='$uname', password='$pass', email='$email', country='$c', state='$s', state_code='$sc',city='$city', pincode='$pin', phone='$phone',address='$add' where user_id=$id";

            $row = mysqli_query($conn, $sql);
            if ($row) {
                 echo "<script>alert('Account updated!')</script>";
                
            } else {
                echo "<script>alert('Account could not be updated!Try again!')</script>";
                
            }
        }
    
    echo "<script>window.location.replace('profile.php')</script>";


?>
