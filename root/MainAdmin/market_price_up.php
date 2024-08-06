<?php
     include_once("../connection/connection.php");
    if(isset($_POST['submit']))
    {
        $id=$_POST['id'];
    $state=$_POST['state'];
     $com=$_POST['com'];
     $mar=$_POST['mar'];
     $arrd=$_POST['arrd'];
     $ar=$_POST['ar'];
     $v=$_POST['v'];
     $minp=$_POST['minp'];
     $maxp=$_POST['maxp'];
     $mop=$_POST['mop'];
    $query = "update market_price set state='$state',commodity='$com',market='$mar',arr_date='$arrd',arr='$ar',variety='$v',min_p='$minp',max_p='$maxp',modal_p='$mop' where id=$id";
    $r = mysqli_query($conn,$query);
header("location:market_price.php");
    }
    ?>