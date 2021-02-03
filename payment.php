<?php

session_start();
 
require_once "config.php";

$cardname=$cardnumber=$expmonth=$cvv="";
$cardname_err=$cardnumber_err=$expmonth_err=$cvv_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

   //cardname 
    if(empty(trim($_POST["cardname"]))){
        $cardname_err = "please enter cardname";
    }else {
        $cardname=trim($_POST["cardname"]);
     }

     //cardnumber
     if(empty(trim($_POST["cardnumber"]))){
        $cardnumber_err = "Please enter a cardnumber";     
    } elseif(strlen(trim($_POST["cardnumber"])) < 16){
        $cardnumber_err= "cardnumber must have 16 digits";
    }
    elseif(strlen(trim($_POST["cardnumber"])) > 16){
        $cardnumber_err="cardnumber should have 16 digits";
    } else{
        $cardnumber= trim($_POST["cardnumber"]);
    }

    //expire month
    if(empty(trim($_POST["expmonth"]))){
        $expmonth_err = "please enter expire month";
    }else {
        $expmonth = trim($_POST["expmonth"]);
     }

    //cvv
    if(empty(trim($_POST["cvv"]))){
        $cvv_err= "Please enter the cvv";     
    } elseif(strlen(trim($_POST["cvv"])) < 3){
        $cvv_err= "expire year should have 3 digits";
    }
    elseif(strlen(trim($_POST["cvv"])) > 3){
        $cvv_err="expire year should have 3 digits";
    } else{
        $cvv = trim($_POST["cvv"]);
    }

    if(empty($cardname_err) && empty($cardnumber_err) && empty($expmonth_err)&& empty($cvv_err)){

        $sql = "INSERT INTO payment (cardname,cardnumber,expmonth,cvv) VALUES (?, ?, ?, ? )";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "sisi", $param_cardname, $param_cardnumber, $param_expmonth,$param_cvv);

            $param_cardname=$cardname;
            $param_cardnumber=$cardnumber;
            $param_expmonth=$expmonth;
            $param_cvv=$cvv;

            if(mysqli_stmt_execute($stmt)){
                header("location: success.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }

  mysqli_close($link);
}
?>


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="image.png">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
    body{
        background-color:black;
    }
    .wrapper
    {
        background: url("card1.jpg")no-repeat center center fixed;
        padding:100px 200px;
        border:40px;
    }
     .card{
              width: 400px;
              background: rgba(0,0,0,0.5);
              margin: 250px auto;
              padding: 35px 30px;
              color:white;
              box-shadow: 10px 10px 10px 10px rgba(0,0,0);
        }
   
    </style>

</head>
<body>
    
<div class="wrapper">

<form action="" method="post" class="card">
<center>
        <div class="form-group <?php echo (!empty($cardname_err)) ? 'has-error' : ''; ?>">
                <label>Name of card</label>
                <input type="text" name="cardname" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
                <span class="help-block"><?php echo $cardname_err; ?></span>
        </div>  

        <div class="form-group <?php echo (!empty($cardnumber_err)) ? 'has-error' : ''; ?>">
                <label>Credit card number</label>
                <input type="text" placeholder="0000 0000 0000 0000" name="cardnumber" class="form-control" value="<?php echo $cardnumber; ?>">
                <span class="help-block"><?php echo $cardnumber_err; ?></span>
        </div>  

        <div class="form-group <?php echo (!empty($expmonth_err)) ? 'has-error' : ''; ?>">
                <label>Expire Month and Year</label>
                <input type="month" name="expmonth" class="form-control" value="<?php echo $expmonth; ?>">
                <span class="help-block"><?php echo $expmonth_err; ?></span>
        </div>  


        <div class="form-group <?php echo (!empty($cvv_err)) ? 'has-error' : ''; ?>">
                <label>CVV</label>
                <input type="password" name="cvv" placeholder="XXX" class="form-control" value="<?php echo $cvv; ?>">
                <span class="help-block"><?php echo $cvv_err; ?></span>
        </div>  
        
     <div class="form-group">
     <input type="submit" class="btn btn-primary" name="pay" value="pay">
     </div>

</form>
</div>
</center>
<center>
<div class="navbar navbar-inverse navbar-bottom" style="margin-top:80px; color:white;"><br>
<p>Live UR Life in Bangalore Days @</p>
</div>


</body>
</html>