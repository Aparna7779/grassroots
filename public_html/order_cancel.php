<?php
include_once 'connection/connection.php';
$id=$_GET['id'];
$query="update orders set order_status='CANCELLED' where order_id=$id";
$sql = mysqli_query($conn, $query);
$proq="select pid,qty from orders where order_id=$id";
$psql = mysqli_query($conn, $proq);
$row=mysqli_fetch_assoc($psql);
$pid=$row['pid'];
$oqty=$row['qty'];
$qtysl="select qty from product where p_id='$pid'";
$tty=mysqli_query($conn,$qtysl);
$roww=mysqli_fetch_assoc($tty);
$qty=$roww['qty'];
$qty=$qty+$oqty;
$up="update product set qty=$qty where p_id=$pid";
$upp=mysqli_query($conn,$up);
if($upp){
    echo"<script>alert('Ordr cancelled!')</script>";
}
else if(!$upp){
    echo"<script>alert('Ordr not cancelled!')</script>";
}
echo "<script>window.location.replace('orderhistory.php')</script>";


?>