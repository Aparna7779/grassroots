<?php
session_start();
$type=$_GET['type'];
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Custom styles for this template -->
        <link href="css/shop-homepage.css" rel="stylesheet">

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
                <br><br>
                <div class="col-lg-9">

                    <div id="carouselExampleIndicators" class="carousel slide my-4s" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="active item">
      
      
      <div class="carousel-caption">
          
        <span>GRASSROOTS</span><h3>The best place to buy and sell your Agri products!</h3>
      </div>
    </div>
                            
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="img/img1.jpg" alt="First slide">
                               
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="img/img2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="img/img3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <br>
                    <br>
                    <div class='row'>

<?php
include_once("connection/connection.php");
$query = "select * from product where p_type=$type";
$r = mysqli_query($conn, $query);

if (mysqli_num_rows($r) > 0) {
    while ($row = mysqli_fetch_array($r)) {




        echo "
                               <div class='col-lg-4 col-md-6 mb-4'>
                               <div class='card h-100'>
                               <a href='item.php?pid=$row[0]'><img class='card-img-top' src='User/pages/forms/$row[9]' alt=''></a>
                               <div class='card-body'>
                               <h4 class='card-title'>
                               <a style='text-decoration:none;' href='item.php?pid=$row[0]'>$row[3]</a>
                               </h4>
                               <h5> Rs. $row[4] </h5>
                               <p class='card-text'>$row[5]</p>
                                 <a href='item.php?pid=$row[0]' class='btn btn-info'>
                              More Information
                               </a></td> 
                                
                               </div>
                               
                               </div>
                               </div> ";
    }
} else {
    echo "0 results";
}
?>

                    </div>

                    <!-- /.row -->
                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Contact:+91 9456428315</p>
        <p class="m-0 text-center text-white">Email:webgrassroots@gmail.com</p>
      </div>
      <!-- /.container -->
    </footer>


        <!-- Bootstrap core JavaScript -->

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script>$(document).ready(function () {
                $('#example').DataTable();
            });</script>
    </body>


</html>

