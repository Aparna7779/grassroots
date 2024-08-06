<?php
include_once 'connection/connection.php';
$id=$_GET['id'];
$query="update orders set order_status='COMPLETED' where order_id=$id";
$sql = mysqli_query($conn, $query);


?>