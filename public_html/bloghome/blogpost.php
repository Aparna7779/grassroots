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
    <link href="css/blog-post.css" rel="stylesheet">

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
                            if ($_SESSION['usertype'] === "ADMIN") {
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
                            <a class='nav-link' href='profile.php'>Profile</a>
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
<?php
$id=$_GET['id'];
   include_once('../connection/connection.php');
$query = "SELECT * from news where news_id=$id";
$r = mysqli_query($conn, $query);
$row = mysqli_fetch_array($r);

    echo " <div class='container'>

      <div class='row'>

        <!-- Post Content Column -->
        <div class='col-lg-8'>

          <!-- Title -->
          <h1 class='mt-4'>$row[1]</h1>

          <hr>

          <!-- Date/Time -->

          <p>Posted on $row[4] </p>

          <hr>

          <!-- Preview Image -->
          <img class='img-fluid rounded' src='../MainAdmin/$row[3]'>

          <hr>

          <!-- Post Content -->
          <p>$row[2]</p>

          
          <hr>";?>

        <a href='bloghome.php' class='btn btn-primary'>Back  </a>
        <br><br>
        </div>

        <!-- Sidebar Widgets Column -->
      

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
