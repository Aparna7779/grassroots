<?php
session_start();
?>


<!DOCTYPE html>
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
    <link href="css/blog-home.css" rel="stylesheet">

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

                            <a href="../index.php" class="nav-link ">
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
                            <a class='nav-link' href='../logout.php'>Logout</a>
                        </li>";
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='../profile.php'>Profile</a>
                        </li>";
                        } else if (!isset($_SESSION['userid'])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='login.php'>Login</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='register.html'>Register</a>
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

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Latest news and updates 
            <small>on agriculture</small>
          </h1>
<?php

         
include_once('../connection/connection.php');
$query = "SELECT * from news";
$r = mysqli_query($conn, $query);

if (mysqli_num_rows($r) > 0) {
    while ($row = mysqli_fetch_array($r)) 
            {
          echo"<div class='card mb-4'>
            <img class='card-img-top' src='../MainAdmin/$row[3]' alt='Card image cap'>
            <div class='card-body'>
              <h2 class='card-title'>$row[1]</h2>
              <p class='card-text'>$row[2]</p>
              <a href='blogpost.php?id=$row[0]' class='btn btn-primary'>Read More </a>
            </div>
            <div class='card-footer text-muted'>
            Posted on $row[4]
              
            </div>
          </div>";
            }

    }
     ?>     

          <!-- Pagination -->
          

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          

        </div>

      </div>
      <!-- /.row -->

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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
