<?php
session_start();
include_once '../connection/connection.php';
if(isset($_POST['submit'])){
   $uname= $_SESSION['username'];
    $id=$_SESSION['userid'];
    $pname=$_POST['pname'];
    $ptype=$_POST['ptype'];
    $qty=$_POST['qty'];
    $unit=$_POST['unit'];
    $dis=$_POST['dis'];
    $price=$_POST['price'];
    
    $target_dir = "../User/pages/forms/uploads/";
    $date=date('D-M-Y h:i:s');
    $pid=$_SESSION['proid'];
     $query = "select image from product where p_id=$pid";
     $r = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($r);
     $img= $row['image'];
    
    $hash=hash('sha512',$date.$uname);
    $targetFile=basename($_FILES["file"]["name"]);

    if(empty($targetFile))
     {
      $target_file=$img;  
     }
  else if(!empty($targetFile))
  {
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
$target_file = $target_dir . substr($hash, 0,20).".".$imageFileType;
$uploadOk = 1;

// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $target_file="../../dist/img/default-50x50.gif";  
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". $target_file. " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    
  }
   
    $d=date('Y-m-d');

    $q="update `agricommerce`.`product` set `p_type`= '$ptype',`p_name`='$pname' ,`qty`='$qty',`unit`='$unit',`p_price`='$price' ,`description`='$dis',`date_added`='$d',`image`='$target_file' where p_id='$pid'";
    
    
    
   $in= mysqli_query($conn, $q);
   
   
   if($in)
    {
          echo "<script> alert('Product edited')</script>";
        header("location:product.php");
    }
    else if(!$in)
    {
       echo "<script> alert('Product could not be edited!Error occured')</script>";
         header("location:index.html");
    }
    
    
    
            
}



?>