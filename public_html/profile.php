<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(isset($_SESSION['userid'])==false)
{
    header("location:login.php");
}
else{
    
    include_once 'connection/connection.php';
    $id=$_SESSION['userid'];
$select = "select * from user_registration where user_id='$id'";
        $chk = mysqli_query($conn, $select);
        if (mysqli_num_rows($chk) > 0){
        $m = mysqli_fetch_assoc($chk);
       
        $fname = $m['f_name'];
           
            $lname = $m['l_name'];
            $uname = $m['username'];
           
            $email = $m['email'];
            $c = $m['country'];
            $s = $m['state'];
            $sc = $m['state_code'];
            $phone = $m['phone'];
            $pin =$m['pincode'];
            $city=$m['city'];
            $username=$m['username'];
            $address=$m['address'];
}

}

?>
  <head>
      <link href="css/shop-homepage.css" rel="stylesheet">

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

                            <a href="index.php" class="nav-link ">
                                <span class="glyphicon glyphicon-home">Home </span></button>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="bloghome/bloghome.php"> News </a>
                        </li>
                        
                        <?php
                        if (isset($_SESSION['userid'])==true) {
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
                            <a class='nav-link' href='orderhistory.php'>ORDER HISTORY</a>
                        </li>";
                                
                            }
                            echo "
                            
                            <li class='nav-item'>
                            <a class='nav-link' href='logout.php'>Logout</a>
                        </li>";
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='profile.php'>Profile</a>
                        </li>";
                        } else if (isset($_SESSION['userid'])==false) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='login.html'>Login</a>
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
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                      
        
                <form method="POST" name="frmChange" id="frmChange" action="profile_up.php">


          <div class="jumbotron">
              
                <h2>Profile</h2>
                    <h4>Edit profile Information</h4>
          </div>
                
                 <div class="form-group">
                     <span>Change first name:</span>
                     <input value="<?php echo $fname?>" class="form-control"  id="register-fnamename" placeholder="Enter First Name" type="text" name="registerFname">
                            </div>
                            <div class="form-group">
<span>Change last name:</span>
                                <input value="<?php echo $lname?>"  class="form-control"  id="register-lname" placeholder="Enter Last Name"  type="text" name="registerLname">
                            </div>
                    <div class="form-group">
<span>Change Username:</span>
                                <input value="<?php echo $username?>"  class="form-control"  id="register-lname" placeholder="Enter User Name"  type="text" name="registerUsername">
                            </div>

                            
                            
                            <div class="form-group">
                                <span>Change email address:</span>
                                <input value="<?php echo $email?>"  class="form-control" id="register-email" placeholder="Email Address "  type="email" name="registerEmail">
                            </div>
                            
                 <div class="form-group">
<span>Change Password:</span>
                               
              

                           
                  

                                <input   class="form-control" id="confirmPassword"  placeholder="Enter new password" type="password" name="registerPassword">
                            </div>
                            
                            <div class="form-group ">
                                <label class="loc">Update location</label>
                                <br>
                               <select value="<?php echo $c?>"  class="form-control"  name="country" id="country" >
                               
                                </select>
                                <br>
                                <br>
                                <label  class="loc">Select state</label> <select value="<?php echo $s?>"  class="form-control"   name="state" id="state" >
                                    
                                </select>
                                <br>
                              <input value="<?php echo $sc?>"  class="form-control" placeholder="Enter state code:(Eg:KL for Kerala)" type="text"  name="statec" >
                              
                              
                              <input value="<?php echo $city ?>"  class="form-control" type="text" placeholder="Enter city" name="city" >
                            </div>
                            <div class="form-group">
                                 <span>Change pin code:</span>
                                <input value="<?php echo $pin?>"  class="form-control" type="text" placeholder="Change pincode" name="pin" >
                            </div>
                            <div  class="form-group">
 <span>Change phone number:</span>
                                <input value="<?php echo $phone?>"  class="form-control" id="register-ph" placeholder="Change Phone Number" type="text" name="registerPhone" >
                            
                  
                            </div>
                    <div class="form-group">
                                 <span>Change Address</span>
                                 <textarea name="add" class="form-control"><?php echo $address?> </textarea>
                            </div>
                        <input class="btn btn-primary" name="submit" type="submit" value="Submit" onclick="return phonenumber(document.frmChange.registerPhone)" />
                    </form>

            </div>
    <!-- /.container -->

            </div>
            <br>
            <br>
        </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Contact:+91 9456428315</p>
        <p class="m-0 text-center text-white">Email:webgrassroots@gmail.com</p>
      </div>
      <!-- /.container -->
    </footer>

    <script>
        var x = document.getElementById("frmChange");
        x.addEventListener("blur",phonenumber, true);
        
    function phonenumber(inputtxt)
{
  var phoneno = /^\d{10}$/;
  if(inputtxt.value.match(phoneno))
  {
      return true;
  }
  else
  {
     alert("Not a valid Phone Number");
     return false;
  }
 
  }
  
  

    </script>
<script type= "text/javascript" src = "js/country.js"></script>
        <script language="javascript">
            populateCountries("country", "state");
          
        </script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/front.js"></script>
  <script>

</script>
<script>
        window.onload = function() {
            var countrySelect = document.getElementById('country');
            var stateSelect = document.getElementById('state');

            // Set default country
            var defaultCountry = "<?php echo $c; ?>";
            for (var i = 0; i < countrySelect.options.length; i++) {
                if (countrySelect.options[i].value === defaultCountry) {
                    countrySelect.selectedIndex = i;
                    break;
                }
            }

            // Set default state
            var defaultState = "<?php echo $s; ?>";
            for (var j = 0; j < stateSelect.options.length; j++) {
                if (stateSelect.options[j].value === defaultState) {
                    stateSelect.selectedIndex = j;
                    break;
                }
            }
        };
    </script>
  </body>

</html>
