<?php
session_start();

if(!isset($_SESSION['userid'])){
    header("location:login.php");
}

if (!empty($_SESSION['userid'])) {
    

  // if($_POST['udf3']==0||$_POST['amount']=0)
   //{
  //     header("location:item.php?pid=pid");
   //}
  
  
    $id = $_SESSION['userid'];
    $datetime = date('m/d/Y h:i:s');
//$dt = new DateTime($s);
    $timestamp = strtotime($datetime);
    $date = date('m/d/Y', $timestamp);
//$date = format('m/d/Y',$dt);
    $pname = $_SESSION['pname'];

    include_once('connection/connection.php');
    $query = "SELECT * FROM `user_registration` WHERE `user_id`='$id'";
    $r = mysqli_query($conn, $query);

    if (mysqli_num_rows($r) > 0) {

        $row = mysqli_fetch_array($r);
        $finame = $row[1];
        $lname= $row[2];
        $fname=$finame." ".$lname;
        $em = $row[5];
        $ph = $row[11];
        $city = $row[9];
        $address1=$row[13]." ".$row[9]." ". $row[10]." ".$row[7]." ".$row[6]." ".$ph;
       
    }
} else {
    $datetime = date('m/d/Y h:i:s');
//$dt = new DateTime($s);
    $timestamp = strtotime($datetime);
    $date = date('m/d/Y', $timestamp);
//$date = format('m/d/Y',$dt);
    $pname = $_SESSION['pname'];
    $fname = " ";

    $em = " ";
    $ph = " ";
    $city = " ";
}






// Merchant key here as provided by Payu
$MERCHANT_KEY = "QyT13U"; //Please change this value with live key for production
$hash_string = '';
// Merchant Salt as provided by Payu
$SALT = "ysDxHhbEmjk0qMnvBVhgZPjxgf3gDGyc"; //Please change this value with live salt for production
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if (!empty($_POST)) {
    //print_r($_POST);
    foreach ($_POST as $key => $value) {
        $posted[$key] = $value;
    }
}

$formError = 0;

if (empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
    $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if (empty($posted['hash']) && sizeof($posted) > 0) {
    if (
            empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo'])
    ) {
        $formError = 1;
    } else {

        $hashVarsSeq = explode('|', $hashSequence);

        foreach ($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }

        $hash_string .= $SALT;


        $hash = strtolower(hash('sha512', $hash_string));
        $action = $PAYU_BASE_URL . '/_payment';
    }
} elseif (!empty($posted['hash'])) {
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
    <head>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script>
            var hash = '<?php echo $hash ?>';
            function submitPayuForm() {
                if (hash == '') {
                    return;
                }
                var payuForm = document.forms.payuForm;
                payuForm.submit();
            }
        </script>
    </head>
    <body onload="submitPayuForm()">
        
        <br/>
<?php if ($formError) { ?>
            
<?php } ?>
         <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                      
        <form action="<?php echo $action; ?>" method="post" name="payuForm" >
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

            <input type="hidden" name="surl" value="http://localhost/Multivendorbackup/MultivendorSite/public_html/response.php" />   <!--Please change this parameter value with your success page absolute url like http://mywebsite.com/response.php. -->
            <input type="hidden" name="furl" value="http://localhost/Multivendorbackup/MultivendorSite/public_html/response.php" /><!--Please change this parameter value with your failure page absolute url like http://mywebsite.com/response.php. -->





          <div class="jumbotron">
              
                <h2>PayU Form</h2>
                    <h4>Please confirm your details.</h4>
          </div>
                
                <div class="form-group">
                    Amount:
                    <input class="form-control disabled"  name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" readonly/>
                </div>
                    <div class="form-group">
                    Full name 
                    <input class="form-control disabled" name="firstname" id="firstname" value="<?php echo $fname; ?>" readonly/>
                   </div>
                <div class="form-group">
                    Email: 
                    <td><input class="form-control disabled" name="email" id="email" value="<?php echo $em; ?>" readonly/>
                </div>
                    <div class="form-group">
                    Phone: 
                    <input class="form-control" name="phone" value="<?php echo $ph; ?>" readonly/>
                    </div>
                
                    <div class="form-group">
                    Product Info: 
                    <input class="form-control" type="text" name="productinfo" value="<?php echo $pname ?>" readonly/>
                    </div>
            
                    <div class="form-group">
                    Quantity:
                    <input class="form-control" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>"  readonly/>
                    </div>
                    <div class="form-group">
              
                    City: 
                    <input class="form-control" name="city" value="<?php echo $city; ?>" />
                    </div>
            
                    <div class="form-group">
                        
                    Shipping Address:
                    <textarea class="form-control" name="address1"  required><?php echo $address1; ?></textarea>
                    </div>


                    <div class="form-group">
                    Date: 
                    <input  class="form-control" name="udf4" value="<?php echo $date; ?>" readonly/>
                    </div>


                


                    <div>
                    <input hidden name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
                    <input hidden name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
                    </div>
<?php if (!$hash) { ?>
                        <input class="btn btn-primary" type="submit" value="Submit" />
<?php } ?>
                
        </form>
            </div>
        </div>
             <br>
             <br>
    </body>
</html>
