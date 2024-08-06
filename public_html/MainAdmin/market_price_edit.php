<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("location:../login.php");
}
    if($_SESSION['usertype']!="ADMIN")
    {
        header("location:../error.html");
    }
    include_once("../connection/connection.php");
    $id=$_GET['id'];
    $query="select * from market_price where id='$id'";
    $r=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($r);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Admin|GrassRoots</title>
        <meta name="description" content="Elmer is a Dashboard & Admin Site Responsive Template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Elmer Admin, Elmeradmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- vector map CSS -->
        <link href="vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>

        <!-- Custom Fonts -->
        <link href="dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Data table CSS -->
        <link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- Custom CSS -->
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->
        <div class="wrapper  theme-1-active pimary-color-blue">
            <!-- Top Menu Items -->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="mobile-only-brand pull-left">
                    <div class="nav-header pull-left">
                        <div class="logo-wrap">
                            <a href="../index.html">
                                <img class="brand-img" src="dist/img/logo.png" alt="brand"/>
                                <span class="brand-text">Admin</span>
                            </a>
                        </div>
                    </div>	
                    <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                    <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                    <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
                    <form id="search_form" role="search" class="top-nav-search collapse pull-left">

                    </form>
                </div>
                <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                    <ul class="nav navbar-right top-nav pull-right">

                        <li class="dropdown auth-drp">
                            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="dist/img/admin.png" alt="user_auth" class="user-auth-img img-circle"/></a>
                            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                                <li>
                                    <a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                                </li>

                                <li class="divider"></li>


                                <li>
                                    <a href="../logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>	
            </nav>
            <!-- /Top Menu Items -->

            <!-- Left Sidebar Menu -->
            <div class="fixed-sidebar-left">
                <ul class="nav navbar-nav side-nav nicescroll-bar">
                    <li class="navigation-header">
                        <span>Main Navigation</span> 
                        <i class="zmdi zmdi-more"></i>

                    </li>

                    <li>
                        <a href="products.php" ><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div></i><div class="clearfix"></div></a>




                        <a href=products.php" ><div class="pull-left"><i class="  fa fa-cubes mr-20"></i><span class="right-nav-text">      Products</span></div><div class="pull-right"></div></i><div class="clearfix"></div></a>





                        <a href="product-orders.php" ><div class="pull-left"><i class=" fa fa-cart-arrow-down mr-20"></i><span class="right-nav-text">     Orders</span></div><div class="pull-right"></div></i><div class="clearfix"></div></a>


                        <a href="reg-users.php" ><div class="pull-left"><i class="fa fa-group mr-20"></i><span class="right-nav-text">    Registered Users</span></div><div class="pull-right"></div></i><div class="clearfix"></div></a>


                        <a href="product_reviews.php" ><div class="pull-left"><i class="fa fa-comments-o mr-20"></i><span class="right-nav-text">     Product reviews</span></div><div class="pull-right"></div></i><div class="clearfix"></div></a>


                        <a href="product-detail.php" ><div class="pull-left"><i class="fa fa-newspaper-o mr-20"></i><span class="right-nav-text">     News updates</span></div><div class="pull-right"></div></i><div class="clearfix"></div></a>

                        <a  class="active" href="market_price.php" ><div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">     Market price</span></div><div class="pull-right"></div></i><div class="clearfix"></div></a>
                    </li>

                </ul>
                </li>


                </ul>
            </div>
            <!-- /Left Sidebar Menu -->

            <!-- Right Sidebar Menu -->
            <div class="fixed-sidebar-right">
                <ul class="right-sidebar">
                    <li>
                        <div  class="tab-struct custom-tab-1">
                            <ul role="tablist" class="nav nav-tabs" id="right_sidebar_tab">
                                <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="chat_tab_btn" href="#chat_tab">chat</a></li>
                                <li role="presentation" class=""><a  data-toggle="tab" id="messages_tab_btn" role="tab" href="#messages_tab" aria-expanded="false">messages</a></li>
                                <li role="presentation" class=""><a  data-toggle="tab" id="todo_tab_btn" role="tab" href="#todo_tab" aria-expanded="false">todo</a></li>
                            </ul>
                            <div class="tab-content" id="right_sidebar_content">
                                <div  id="chat_tab" class="tab-pane fade active in" role="tabpanel">
                                    <div class="chat-cmplt-wrap">
                                        <div class="chat-box-wrap">
                                            <div class="add-friend">
                                                <a href="javascript:void(0)" class="inline-block txt-grey">
                                                    <i class="zmdi zmdi-more"></i>
                                                </a>	
                                                <span class="inline-block txt-dark">users</span>
                                                <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <form role="search" class="chat-search pl-15 pr-15 pb-15">
                                                <div class="input-group">
                                                    <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                            <div id="chat_list_scroll">
                                                <div class="nicescroll-bar">
                                                    <ul class="chat-list-wrap">
                                                        <li class="chat-list">
                                                            <div class="chat-body">

                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-chat-box-wrap">
                                            <div class="recent-chat-wrap">
                                                <div class="panel-heading ma-0">
                                                    <div class="goto-back">
                                                        <a  id="goto_back" href="javascript:void(0)" class="inline-block txt-grey">
                                                            <i class="zmdi zmdi-chevron-left"></i>
                                                        </a>	

                                                        <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body pa-0">

                                                        <div class="input-group">
                                                            <input type="text" id="input_msg_send" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
                                                            <div class="input-group-btn emojis">

                                                            </div>
                                                            <div class="input-group-btn attachment">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /Right Sidebar Menu -->



            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">Market Prices of commodities</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="index.html">Dashboard</a></li>

                                <li class="active"><span>market-price</span></li>
                            </ol>
                        </div>
                        <!-- /Breadcrumb -->
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body row">
                                        <div class="table-wrap">
                                            <div class="table-responsive">
                                                <form action="market_price_up.php" method="POST">
                                                    <table class="table display responsive  mb-30" id="myTable">
                                                        <tr>
                                                           
                                                            <td>Enter State:</td>
                                                            <td><input value="<?php echo $row['state'];?>" type="text" name="state"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enter Commodity:</td>
                                                            <td><input value="<?php echo $row['commodity'];?>" type="text" name="com"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enter Market:</td>
                                                            <td><input value="<?php echo $row['market'];?>" type="text" name="mar"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enter Arrival date</td>
                                                            <td><input value="<?php echo $row['arr_date'];?>" type="date" name="arrd"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Arrivals(in quintels)</td>
                                                            <td><input  value="<?php echo $row['arr'];?>" type="text" name="ar"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enter Variety</td>
                                                            <td><input value="<?php echo $row['variety'];?>" type="text" name="v"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enter Minimum Price:</td>
                                                            <td><input value="<?php echo $row['min_p'];?>" type="text" name="minp"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enter Maximum Price</td>
                                                            <td><input value="<?php echo $row['max_p'];?>" type="text" name="maxp"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enter Modal price:</td>
                                                            <td><input value="<?php echo $row['modal_p'];?>" type="text" name="mop"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <input type='hidden' name='id' value="<?php $id ;?>">
                                                            <td><input class="btn btn-primary" type="submit" name="submit" value="UPDATE"></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>	
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                    
                </div>

                <!-- Footer -->
                <footer class="footer container-fluid pl-30 pr-30">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>2017 &copy; Elmer. Pampered by Hencework</p>
                        </div>
                    </div>
                </footer>
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Data table JavaScript -->
        <script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="dist/js/productorders-data.js"></script>

        <!-- Slimscroll JavaScript -->
        <script src="dist/js/jquery.slimscroll.js"></script>

        <!-- Owl JavaScript -->
        <script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

        <!-- Switchery JavaScript -->
        <script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>

        <!-- Fancy Dropdown JS -->
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>

        <!-- Init JavaScript -->
        <script src="dist/js/init.js"></script>

    </body>
    
</html>
