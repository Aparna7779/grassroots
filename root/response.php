<?php
session_start();

include_once('connection/connection.php');

$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"]; //Please use the amount value from database
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$phone = $_POST["phone"];
$address = $_POST["address1"];
$empty1 = $_POST["udf1"];
$empty2 = $_POST["udf2"];
$city = $_POST["city"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$qty = $_POST["udf3"];
$date = $_POST["udf4"];
$addr=$_POST["address1"];
$salt = "ysDxHhbEmjk0qMnvBVhgZPjxgf3gDGyc"; //Please change the value with the live salt for production environment
if(isset($_SESSION['pid']) && isset ($_SESSION['userid'] )){
    $pid = $_SESSION['pid'];
    $id = $_SESSION['userid'];
}
else{
    echo "<script> alert('Logged out of system. Please login again')</script>";
    echo "<script>window.location.replace('login.php');</script>";
}

//Validating the reverse hash
If (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||' . $date . '|' . $qty . '|' . $empty1 . '|' . $empty2 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {

    $retHashSeq = $salt . '|' . $status . '|||||||' . $date . '|' . $qty . '|' . $empty1 . '|' . $empty2 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);

if ($hash != $posted_hash) {
    
    echo "<script>alert('Transaction has been tampered. Please try again')</script>";
    
}
else {
    if ($status) {
        switch ($status) {
            case 'success':
                $ck="select transaction_id from orders where transaction_id='$txnid'";
                $sqls = mysqli_query($conn, $ck);
                if(mysqli_num_rows($sqls)<=0){
                
                    echo "<script>alert('Thank You, " . $firstname . ".Your order status is " . $status . ".')</script>";
                    echo "<script>alert('Your Transaction ID for this transaction is " . $txnid . ".')</script>";
                
                    $q = "INSERT INTO `orders`(`user_id`, `pid`, `amount`, `date`, `qty`, `order_status`, `transaction_id`, `payment_status`, `address`) VALUES ('$id','$pid','$amount','$date','$qty','ORDER PLACED','$txnid','PAID','$address')";
                    $sql = mysqli_query($conn,$q);
                    
                
                 
                
                if($sql){
                    $pquery = "SELECT * FROM `product` WHERE `p_id`='$pid'";
                
                    $pr = mysqli_query($conn, $pquery);
                    if (mysqli_num_rows($pr) > 0) {
                        while ($prow = mysqli_fetch_assoc($pr)) {
                            $qqty = $prow['qty'];
                            
                            $nowqty = $qqty - $qty;
                            
                            $update = "UPDATE `agricommerce`.`product` SET `qty` = '$nowqty' WHERE `product`.`p_id` = '$pid'";
                            $upsql = mysqli_query($conn, $update);
                            
                           
                            
                    if ($sql && $upsql) {
                        echo "<script> alert('Payment Complete!')</script>";
                        echo "<script>window.location.replace('mail.php?txnid=$txnid&firstname=$firstname&email=$email&amount=$amount&proinfo=$productinfo&qty=$qty&date=$date')</script>";
                        echo "<script>alert('Transaction details have been mailed to you!')</script>";
                       
                    } 
                        }
                    }
                    
                    echo "<script>window.location.replace('orderhistory.php');</script>";
                }
            }
                   
                case 'failure':
                    echo "<script>alert('Payment failed. Please try again.')</script>";
                    echo "<script>window.location.replace('index.php');</script>";
                    break;
                case 'pending':
                    echo "<script>alert('Payment is pending. Please wait for confirmation.')</script>";
                    echo "<script>window.location.replace('orderhistory.php');</script>";
                    break;
                default:
                    echo "<script>alert('Unknown payment status. Please contact support.')</script>";
                    echo "<script>window.location.replace('orderhistory.php');</script>";
                    break;
                    
                

            }
    }
   
}



?>

</body>
</html>