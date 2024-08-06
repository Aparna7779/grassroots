<?php

session_start();
include_once('connection/connection.php');
$pid = $_SESSION['pid'];
 $em = $_POST['em'];
 $r = $_POST['review'];
 $d=date("y/m/d h:i:s a");
if(empty($em)||empty($r))
{
    echo "Fields should not be empty!";
}
if (isset($_POST['submit'])) {
   
    $query = "INSERT INTO `agricommerce`.`reviews` (`p_id` ,`email` ,`content` ,`date_added`)VALUES ('$pid','$em', '$r','$d');";
    $r = mysqli_query($conn, $query);
    header("location:item.php?pid=$pid");
}
?>