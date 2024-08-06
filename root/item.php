<!DOCTYPE html>
<?php


session_start();
 if (isset($_SESSION['userid']))
 {
$uid=$_SESSION['userid'];
 }
 else {
     $uid="";
}
$pid = $_GET['pid'];
$_SESSION['pid'] = $pid;


include_once('connection/connection.php');
$query = "SELECT * FROM `product` WHERE `p_id`='$pid'";
$r = mysqli_query($conn, $query);

$get_id_of_productowner="SELECT `user_id` FROM `product` WHERE `p_id`='$pid'";
$pid_owner_query=mysqli_query($conn,$get_id_of_productowner);

if (mysqli_num_rows($pid_owner_query)>0){
while($row=mysqli_fetch_array($pid_owner_query)){
    $pid_owner=$row[0];
}
}

if (mysqli_num_rows($r) > 0) {
    while ($row = mysqli_fetch_array($r)) {
        $pname = $row[3];
        $_SESSION['pname'] = $pname;
        $qty = $row[6];
        $price = $row[4];
        $dis = $row[5];
        $im = $row[9];
        $unit=$row[7];
    }
}
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>GRASSROOTS</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/shop-item.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">

                <a class="navbar-brand" href="#">
                   GRASSROOTS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">

                            <a href="index.php" class="nav-link ">
                                <span class="glyphicon glyphicon-home">Home </span></button>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="bloghome/bloghome.php"> News </a>
                        </li>
                        
                        <?php
                        if (isset($_SESSION['userid'])) {
                            if ($_SESSION['usertype'] == "ADMIN") {
                                echo "
                            
                            <li class='nav-item'>
                            <a class='nav-link' href='MainAdmin/product.php'>Admin Dashboard</a>
                        </li>";
                            }
                            if ($_SESSION['usertype'] == "CUSTOMER") {
                                echo "
                            
                            <li class='nav-item'>
                            <a class='nav-link' href='orderhistory.php'>Order History</a>
                        </li>";
                            }
                            if ($_SESSION['usertype'] == "VENDOR") {
                                echo "
                            
                            <li class='nav-item'>
                            <a class='nav-link' href='User/index.php'>VENDOR DASHBOARD</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='orderhistory.php'>Order History</a>
                        </li>";
                        
                                
                            }
                            echo "
                            
                            <li class='nav-item'>
                            <a class='nav-link' href='logout.php'>Logout</a>
                        </li>";
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='profile.php'>Profile</a>
                        </li>";
                        } else if (!isset($_SESSION['userid'])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='login.php'>Login</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='register.html'>Register</a>
                        </li>";
                        }
                        ?>
                        <li class="nav-item">

                            <span class="glyphicon glyphicon-home"></span><a class="nav-link" href=""></a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-lg-3">
                    <br>
                    <br>
                    <h4 class="my-4"> <span>CATEGORIES</span></h4>
                     <div class="list-group">
                       
                        <a href="index2.php?type='Seeds'" class="list-group-item">Seeds</a>
                        <a href="index2.php?type='Fruits'" class="list-group-item">Fruits</a>
                        <a href="index2.php?type='Vegetables'" class="list-group-item">Vegetables</a>
                        <a href="index2.php?type='Cereals'" class="list-group-item">Cereals</a>
                        <a href="index2.php?type='Spices'" class="list-group-item">Spices</a> 
                        <a href="index2.php?type='Saplings'" class="list-group-item">Saplings</a> 
                        
                       
                        <a href="index2.php?type='Agricultural Machinery'" class="list-group-item">Agricultural Machinery</a>
                        <a href="index2.php?type='Fertilizers'" class="list-group-item">Fertilizers</a>
                       <a href="index2.php?type='Plant Nutrition'" class="list-group-item">
                             Plant Nutrition</a>
                         <a href="index2.php?type='Coffee and Tea'" class="list-group-item"> Coffee and Tea</a>
                        
                    </div>

                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">
                    <form action="payuform.php" method="POST" id="form1">
                        <div class="card mt-4">
                            <img class="card-img-top img-fluid" src="User/pages/forms/<?php echo $im; ?>" alt="">
                            <div class="card-body">

                                <h3 class="card-title"><?php echo $pname; ?></h3>

                                <h4><i class="fa fa-inr" aria-hidden="true"></i><?php echo $price; ?></h4>
                                <p class="card-text"><?php echo $dis; ?></p>
                               
                                <label>Quantity:</label> <input class='form-control' type="number" value="1" id="qty" onchange="priceupdate(this.value)" name="udf3"/>
                                <label>Unit:</label>
                               <input class='form-control' readonly="true" type="text" value="<?php echo $unit; ?>" id="unit"/>
                                <label>Total Price:</label><input class='form-control' readonly="" type="text" value="<?php echo $price; ?>" id="total" name="amount"/>
                                <br>
                                <label>Remaining Stock:</label>
                                <input class='form-control' readonly="true" type="text" value="<?php echo $qty.$unit; ?>" id="unit"/>
                                <hr>
                               
<?php echo "<script>var price=" . $price . "; console.log(price);</script>"; ?>
                                <?php
                                if ($qty <= 0) {
                                    echo "<input  type='button' value='No stock' class='btn btn-primary disabled'> ";
                                } else {
                                    
                                    if(isset($_SESSION['userid']))
                                    {
                                     if($_SESSION['usertype']=='CUSTOMER')
                                     {
                                        
                                     echo "<input type='submit' value='Purchase' class='btn btn-primary' id='purchaseButton'>";
                                     }
                                     if($_SESSION['usertype']=='VENDOR' && $_SESSION['userid']==$pid_owner){
                                        echo "<input type='submit' value='Purchase' class='btn btn-primary disabled' id='purchaseButton'>";
                                     }
                                     else if($_SESSION['usertype']=='VENDOR' && $_SESSION['userid']!=$pid_owner){
                                        echo "<input type='submit' value='Purchase' class='btn btn-primary' id='purchaseButton'>";
                                     }
                                     else if($_SESSION['usertype']=='ADMIN')
                                     {
                                        echo "<a href='MainAdmin/p_del.php?id=$pid'><input type='' value='Delete' class='btn btn-primary' id='purchaseButton'></a>";
                                      }
                                    }
                                    else if(!isset($_SESSION['userid']))
                                    {
                                        echo "<a href='login.php'><input type='submit' value='Purchase' class='btn btn-primary' id='purchaseButton'></a>";
                                    }
                                    }
                                
                                ?>
                            </div>
                        </div>
                        <!-- /.card -->
                    </form>
                    <div class="card card-outline-secondary my-4">
                        <div class="card-header">
                            Product Reviews
                        </div>
                        <div class="card-body">
<?php
$rquery = "SELECT * FROM `reviews` WHERE `p_id`='$pid'";
$ri = mysqli_query($conn, $rquery);

while ($row = mysqli_fetch_assoc($ri)) {


    echo "<p>". $row['content'] ."</p>";
    echo "<small class='text-muted'>Posted by ".$row['email'] ." on ".$row['date_added']."</small>";
    echo "<hr>";
}
    ?>

                            <form action="review.php" method="POST">

                                <div class="form-group">
                                    <label class="control-label mb-10" for="review">Your review</label>
                                    <textarea required class="form-control" id="review" name="review" placeholder="Add review"></textarea>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                            <input type="email" class="form-control" name="em" id="em" placeholder="Enter email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                <?php 
                                if ($_SESSION['userid']==$pid_owner){
                                    echo "<input type='submit' class='btn btn-success disabled' value='Leave a Review' name='submit' id='reviewButton' >";
                                }
                                else{
                                    echo "<input type='submit' class='btn btn-success' value='Leave a Review' name='submit' id='reviewButton'>";
                                }
                                    ?>
                                    
                                </div>


                            </form>


                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-lg-9 -->

            </div>

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Contact:+91 9456428315</p>
        <p class="m-0 text-center text-white">Email:webgrassroots@gmail.com</p>
      </div>
      <!-- /.container -->
    </footer>


        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script>
  
            
                                    function priceupdate(v) {
                                        
                                        console.log(v * price);
                                        $("#total").val(v * price);
                                    }

        </script>
        
        <script>
            var x = document.getElementById("form1");

x.addEventListener("blur", qty, true);
                      function qty(){
                var uqty=document.getElementById("qty").value;
              var qty=<?php echo $qty;?>;
if(uqty>qty){
    alert('Reamainig stock less than requested');
    document.getElementById("qty").value="1";
    priceupdate(document.getElementById("qty").value);
}
if(uqty<=0){
    alert('Please give order quantity greater than 0!');
    document.getElementById("qty").value="1";
    priceupdate(document.getElementById("qty").value);
}
}

document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('purchaseButton').addEventListener('click', handleButtonClick);
            document.getElementById('reviewButton').addEventListener('click', handleButtonClick);
        });

        function handleButtonClick(event) {
            const currentUserId = '<?php echo $_SESSION['userid']; ?>';
            const productOwnerId='<?php echo $pid_owner; ?>';

            if (currentUserId === productOwnerId) {
                event.preventDefault(); // Prevent the default action
                displayErrorMessage('Vendors are not allowed to purchase or review their own products.');
            } else {
                // Proceed with the button's default action
            }
            function displayErrorMessage(message) {
            alert(message); // Display the error message as a popup
        }
        }
    </script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    </body>

</html>
