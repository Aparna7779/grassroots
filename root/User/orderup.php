<?php
include_once 'connection/connection.php';
$id=$_GET['id'];
$st=$_GET['st'];
$query="update orders set order_status='$st' where order_id=$id";
$sql = mysqli_query($conn, $query);
header("location:product-orders.php");


?>