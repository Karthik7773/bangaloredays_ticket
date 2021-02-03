<?php

session_start();
 
require_once "config.php";

$username=$busname=$busnumber=$buscategory=$inplace=$deplace=$date=$departime=$amount="";
$username_err=$busname_err=$busnumber_err=$buscategory_err=$inplace_err=$deplace_err=$date_err=$departime_err=$amount_err="";

if(isset($_POST['payment']))
{
    if(empty(trim($_POST["username"]))) {
        $username_err= "please enter the username";
    }else {
            $username=trim($_POST["username"]);
        }
//
        if(empty(trim($_SESSION["inplace"]))) {
            $inplace_err= "please enter the inplace";
    }else {
            $inplace=trim($_SESSION["inplace"]);
        }    

    if(empty(trim($_SESSION["deplace"]))) {
            $deplace_err= "please enter the deplace";
    }else {
            $deplace=trim($_SESSION["deplace"]);
        } 
     
    if(empty(trim($_SESSION["date"]))) {
            $date_err= "please enter the date";
    }else {
            $date=trim($_SESSION["date"]);
        }        
 //   
    if(empty(trim($_SESSION["busname"]))) {
            $busname_err= "please enter the busname";
    }else{
            $busname=trim($_SESSION["busname"]);
        }

    if(empty(trim($_SESSION["busnumber"]))) {
            $busnumber_err= "please enter the busnumber";
    }else{
            $busnumber=trim($_SESSION["busnumber"]);
        }    
            
    if(empty(trim($_SESSION["buscategory"]))) {
            $buscategory_err= "please enter the buscategory";
    }else {
            $buscategory=trim($_SESSION["buscategory"]);
        }    
     
        
    if(empty(trim($_SESSION["departime"]))) {
            $departime_err= "please enter the departion";
    }else {
            $departime=trim($_SESSION["departime"]);
        }  
        
    if(empty(trim($_SESSION["amount"]))) {
            $amount_err= "please enter the amount";
    }else {
            $amount=trim($_SESSION["amount"]);
    }      
        
    
if(empty($username_err) && empty($busname_err) && empty($busnumber_err) && empty($buscategory_err) && empty($inplace_err) && empty($deplace_err) && empty($date_err) && empty($departime_err) && empty($amount_err))
        {
            $sql = "INSERT INTO userdetail (username, busname, busnumber, buscategory, inplace, deplace, date, departime, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
    
                mysqli_stmt_bind_param($stmt, "ssssssssi", $param_username, $param_busname, $param_busnumber, $param_buscategory, $param_inplace, $param_deplace, $param_date, $param_departime, $param_amount);
                
                $param_username = $username;
                $param_busname= $busname;
                $param_busnumber=$busnumber;
                $param_buscategory=$buscategory;
                $param_inplace=$inplace;
                $param_deplace=$deplace;
                $param_date=$date;
                $param_departime=$departime;
                $param_amount=$amount;
                
    
                if(mysqli_stmt_execute($stmt)){ 

                    header("location: payment.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);   
        }
        mysqli_close($link);  
    }

?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="image.png">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif;  }
        body{
            background: url("bang1.jpg") no-repeat center center fixed;
           -webkit-background-size:cover;
           -moz-background-size:cover;
           -o-background-size:cover;
            background-size: cover;
        }
        .wrapper { width: 350px; padding: 20px; }
        .page{ margin-right:20px;margin-left:20px; }
        .page-header{
              width: auto;
              background: rgba(0,0,0,0.5);
              margin: 15% auto;
              padding: 40px 0;
              color:white;
              box-shadow: 0 0 10px 10px rgba(0,0,0);
        }
        .page-header2{
              width: 400px;
              background: rgba(0,0,0,0.5);
              margin: auto;
              padding: 35px 30px;
              color:white;
              box-shadow: 10px 10px 10px 10px rgba(0,0,0);
        }
    </style>
</head>
<body>

 <div>
<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="" style="color:white;">Bangalore Days</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"> Logout</a></li>
                    </ul>
                </div>
            </div>
     </div>
<center>
    <div class="page-header"><br><br>
     <h1 style="color:white;">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b><br><br> Make Ur journey safe by <br><br> traveling in Bangalore Days</h1>   
        </img>
    </div>
   
    <div class="wrapper">
        <h2 style="color:white;">Book here</h2>
        <p style="color:white;">Please fill to register</p>
 

<form method="post">

<label style="color:white;">FROM : </label>
     <input type="text" name="inplace" list="host" class="form-control" placeholder="enter your place">
        <datalist id="host">
        <?php 
         $result = mysqli_query($link,"SELECT inplace FROM places order by pid");
         while($row = mysqli_fetch_array($result)) 
             echo "<option value='" . $row['inplace'] . "'>" . $row['inplace'] . "</option>";
         ?> 
        </datalist><br><br>
        
<label style="color:white;">TO : </label>        
     <input type="text" name="deplace" list="host1" class="form-control" placeholder="enter your place">
        <datalist id="host1">
        <?php 
         $result = mysqli_query($link,"SELECT deplace FROM places order by pid");
         while($row = mysqli_fetch_array($result)) 
             echo "<option value='" . $row['deplace'] . "'>" . $row['deplace'] . "</option>";
         ?> 
        </datalist><br>


        <label style="color:white;">DATE : </label><input type="date" name="date" style="margin:10px;"><br><br>

        <input type="submit" class="btn btn-primary" name="search" value="search">
</form>

</div>
<?php   

if(isset($_POST['search'])){

     $deplace= $_POST['deplace'];
     $inplace= $_POST['inplace'];
     $date=$_POST['date'];

     $_SESSION['inplace']=$_POST['inplace'];
     $_SESSION['deplace']=$_POST['deplace'];
     $_SESSION['date']=$_POST['date'];

    $query="SELECT * FROM places p WHERE p.inplace='$inplace' AND p.deplace='$deplace'"; 

    $query_run=mysqli_query($link,$query);


        while($row=mysqli_fetch_array($query_run))
        {
                   ?>
                   <div class="wrapper page-header2">
                      <form action="" method="get" class="page">
                          <label>Busname</label>
                          <input type="text" name="busname" class="form-control page" value="<?php echo $row['busname'] ?>" disabled /><br>
                          <label>Busnumber</label>
                          <input type="text" name="busnumber" class="form-control page" value="<?php echo $row['busnumber'] ?>" disabled /><br>
                          <label>Buscategory</label>
                          <input type="text" name="buscategory" class="form-control page" value="<?php echo $row['buscategory'] ?>" disabled /><br>
                          <label>Departime</label>
                          <input type="text" name="departime" class="form-control page" value="<?php echo $row['departime'] ?>" disabled /><br>
                          <label>Amount</label>
                          <input type="text" name="amount" class="form-control page" value="<?php echo $row['amount'] ?>" disabled /><br>
                          <label>Place</label>
                          <input type="text" name="place" class="form-control page" value="<?php echo $row['inplace'] ?> TO <?php echo $row['deplace'] ?>" disabled /><br>

                          <!-- <input type="submit" name="payment" class="btn btn-primary" value="payment"> -->
                      </form>
                    </div>  
                   <?php    
                   $username=$_SESSION['username'];
                   $busname=$row['busname'];
                   $busnumber= $row['busnumber'];
                   $buscategory=$row['buscategory'];
                   $departime=$row['departime'];
                   $amount= $row['amount'];

                   $_SESSION['busname']=$row['busname'];
                   $_SESSION['busnumber']=$row['busnumber'];
                   $_SESSION['buscategory']=$row['buscategory'];
                   $_SESSION['departime']= $row['departime'];
                   $_SESSION['amount']=$row['amount'];

                  

         }
if(mysqli_num_rows($query_run)==0){
             echo "<script>alert('route not exits');</script>";
         }

        mysqli_close($link); 
}
 ?>

<div class="wrapper  page-header2">
<h2 style="color:white;">View your details</h2>
<p style="color:white;">check the details porperly</p>
<form action="" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($busname_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Busname</label>
                <input type="text" name="busname" class="form-control" value="<?php echo htmlspecialchars($busname); ?>" disabled>
                <span class="help-block"><?php echo $busname_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($busnumber_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Busnumber</label>
                <input type="text" name="busnumber" class="form-control" value="<?php echo htmlspecialchars($busnumber); ?>" disabled>
                <span class="help-block"><?php echo $busnumber_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($buscategory_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Buscategory</label>
                <input type="text" name="buscategory" class="form-control" value="<?php echo htmlspecialchars($buscategory); ?>" disabled>
                <span class="help-block"><?php echo $buscategory_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($inplace_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Intial Place</label>
                <input type="text" name="inplace" class="form-control" value="<?php echo htmlspecialchars($inplace); ?>" disabled>
                <span class="help-block"><?php echo $inplace_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($deplace_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Destination Place</label>
                <input type="text" name="deplace" class="form-control" value="<?php echo htmlspecialchars($deplace); ?>" disabled>
                <span class="help-block"><?php echo $deplace_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Date</label>
                <input type="text" name="date" class="form-control" value="<?php echo htmlspecialchars($date); ?>" disabled>
                <span class="help-block"><?php echo $date_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($departime_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Departuer</label>
                <input type="text" name="departime" class="form-control" value="<?php echo htmlspecialchars($departime); ?>" disabled>
                <span class="help-block"><?php echo $departime_err; ?></span>
            </div>  
 

            <div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                <label style="color:white;">Amount</label>
                <input type="text" name="amount" class="form-control" value="<?php echo htmlspecialchars($amount); ?>" disabled>
                <span class="help-block"><?php echo $amount_err; ?></span>
            </div>    

<input type="submit" name="payment" class="btn btn-primary" value="payment">

</from>
</div>

<div class="navbar navbar-inverse navbar-bottom" style="margin-top:80px; color:white;"><br>
<p>Live UR Life in Bangalore Days @</p>
</div>

</body>
</html>     