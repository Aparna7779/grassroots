<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
} else {
    $uid = $_SESSION['userid'];
}
?>



<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <link rel="stylesheet" href="User/plugins/datatables/dataTables.bootstrap.css">

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

                <a class="navbar-brand" href="index.php">
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
                        </li>
                         <li class='nav-item'>
                            <a class='nav-link' href='profile.php'>Profile</a>
                        </li>";
    }
    if ($_SESSION['usertype'] == "VENDOR") {
        echo "
                            
                            <li class='nav-item'>
                            <a class='nav-link' href='User/index.php'>VENDOR DASHBOARD</a>
                        </li>
                        
                               <li class='nav-item'>
                            <a class='nav-link' href='profile.php'>Profile</a>
                        </li>";
                        
    }
    echo "
                            
                            <li class='nav-item'>
                            <a class='nav-link' href='logout.php'>Logout</a>
                        </li>";
} else if (!isset($_SESSION['userid'])) {
    echo "<li class='nav-item'>
                            <a class='nav-link' href='login.html'>Login</a>
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
include_once("connection/connection.php");
$query = "select * from orders where user_id='$uid' order by STR_TO_DATE(date, '%m/%d/%Y') desc";
$r = mysqli_query($conn, $query);
        if (mysqli_num_rows($r) > 0) {
            echo "
        <div class='limiter'>
            <div class='container-table100'>
                <div class='wrap-table100'>
                    <div class='table100'>
                        <table>
                            <thead>
                                <tr class='table100-head'>
                                    <th class='column1'>Date</th>
                                    <th class='column2'>Order ID</th>
                                    <th class='column3'>Name</th>
                                    <th class='column4'>Total Amount</th>
                                    <th class='column5'>Quantity</th>
                                    <th class='column6'>Status</th>
                                    <th class='column6'>Actions</th>
                                    <th class='column6'>Shipping Address</th>
                                </tr>
                            </thead>
                            <tbody>";



    while ($row = mysqli_fetch_array($r)) {
        echo "
                                <tr>
                                <td class = 'column1'>" . $row[4] . "</td>
                                <td class = 'column2'>" . $row[0] . "</td>";
                              $pq="select p_name from product where p_id=$row[2]";
                              $qpq=mysqli_query($conn,$pq);
                              $prow = mysqli_fetch_assoc($qpq);
                              
                               echo" <td class = 'column3'>" . $prow['p_name'] . "</td>
                                <td class = 'column4'>" . "Rs." . $row[3] . "</td>
                                <td class = 'column5'>" . $row[5] . "</td>";
        if ($row[6] === 'PROCESSING') {
            echo "<td style='color:red;' class = 'column6'>" . $row[6] . "</td>";
        } else if ($row[6] === 'DELIVERED') {
            echo "<td style='color:green;' class = 'column6'>" . $row[6] . "</td>";
        }
         else if ($row[6] === 'SHIPPED') {
            echo "<td style='color:BLUE;' class = 'column6'>" . $row[6] . "</td>";
        }
         else if ($row[6] === 'COMPLETED') {
            echo "<td style='color:blue;' class = 'column6'>" . $row[6] . "</td>";
        }
         else if ($row[6] === 'CANCELLED') {

            echo "<td style='color:red;' class = 'column6'>$row[6]</td>";
        }
    else{
        echo "<td style='color:black;' class = 'column6'>$row[6]</td>";
    }

        echo "<td class = 'column7'>";
        if ($row[6] === 'PROCESSING'||$row[6] === 'ORDER PLACED') {

            echo "<a href='order_cancel.php?id=$row[0]'>Cancel</a>";
        } else if ($row[6] === 'DELIVERED') {

            echo "<a href='order_confirm.php?id=$row[0]'>Confirm</a>";
        }
       else if ($row[6] === 'SHIPPED') {

            echo "No actions required.Awaiting delivery.";
        }
       else if ($row[6] === 'COMPLETED') {

            echo "No actions required.Order successfully delivered.";
        }
         else if ($row[6] === 'CANCELLED') {

           echo "<a style = 'color:RED;' href = 'orderdel.php?id=$row[0]'>REMOVE</a>";
          
        }
        echo "<td class = 'column1'>" . $row[9] . "</td>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "You haven't placed any orders yet!

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>";
}
?>
        <!--/.container -->

       

        <!--Bootstrap core JavaScript -->
        <script src = "User/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="User//plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>


</html>

