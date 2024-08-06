


<!DOCTYPE html>
<?php session_start();
if(!isset($_SESSION['userid']))
{
    header("location:login.php");
}
$id=$_SESSION['userid'];?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vendor | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
    <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>R</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GrassRoots</b>  Vendor</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
              <span class="hidden-xs"><?php echo "Welcome"." ". $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                

                <p>
                  <?php echo $_SESSION['username']; ?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="../profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
       
          
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
       
        
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/product-add.php"><i class="fa fa-circle-o"></i> Add products</a></li>
            <li><a href="pages/tables/data.php"><i class="fa fa-circle-o"></i> View all products</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="pages/tables/orders.php">
            <i class="fa fa-table"></i> <span>Orders</span>
            
          </a>
          
        </li>
         <li class="treeview">
          <a href="pages/tables/market-price.php">
           <span>&#8377Market Price</span>
            
          </a>
          
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-4">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Your Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Product ID</th>
                    <th>Item</th>
                 
                    
                  </tr>
                  </thead>
                  <tbody>
                  
                  
                  <?php
              
              include_once("../connection/connection.php");
                        $query = "select * from product where user_id=$id";
                        $r = mysqli_query($conn, $query);

                        if (mysqli_num_rows($r) > 0) {
                            while ($row = mysqli_fetch_array($r)) {




                                echo "
                               <tr>
                    <td><a href='pages/examples/invoice.html'>$row[0]</a></td>
                    <td>$row[3]</td>
                   
                    
                  </tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                  
                  
                  
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               

              <a href="javascript:void(0)" onclick="window.open('pages/forms/product-add.php');" class="btn btn-sm btn-info btn-flat pull-left"> <i class="fa fa-plus" aria-hidden="true">Add product</i></a>
              <a href="javascript:void(0)" onclick="window.open('pages/tables/data.php');"class="btn btn-sm btn-default btn-flat pull-right">View All </a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
        
      
             
 
         
        <div class="col-md-8">
          
          
       
         
          <!-- /.box -->

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                  
                
              <?php
              
              include_once("../connection/connection.php");
              
                        $query = "select * from(SELECT * FROM product ORDER BY p_id DESC LIMIT 6) product order by date_added desc";
                        $r = mysqli_query($conn, $query);

                        if (mysqli_num_rows($r) > 0) {
                            while ($row = mysqli_fetch_array($r)) {




                                echo "
                               <li class='item'>
                  <div class='product-img'>
                    <img src='pages/forms/$row[9]' alt='product image'>
                  </div>
                  <div class='product-info'>
                    <a href='javascript:void(0)' class='product-title'>$row[3]
                      <span class='label label-warning pull-right'>Rs.$row[4]</span></a>
                        <span class='product-description'>
                         $row[5]
                        </span>
                  </div>
                </li>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
              
              
              
                
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" onclick="window.open('../index.php');" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
         
          <!-- /.box -->
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
