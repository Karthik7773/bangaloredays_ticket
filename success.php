<?php

session_start();
 
require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="image.png">


    <style type="text/css">
    body{
            background: url("bang1.jpg") no-repeat center center fixed;
            background-size: 1500px 800px;
        }
        .wrapper { width: 350px; padding: 20px; }
        .page-header2{
              width: 400px;
              background: rgba(0,0,0,0.3);
              margin: auto;
              padding: 35px 30px;
              color:white;
              box-shadow: 10px 10px 10px 10px rgba(0,0,0);
        }    
    </style>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

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
</div><br><br><br>
<center>
<h2 style="color:white;">Your Registration is Successfull</h2>
</center>


<div class="wrapper  page-header2">
<h2 style="color:white;">View your details</h2>

    <label style="color:white;">Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>"  disabled>

    <label style="color:white;">Busname</label>
    <input type="text" name="busname" class="form-control" value="<?php echo htmlspecialchars($_SESSION["busname"]); ?>"  disabled>

    <label style="color:white;">Busnumber</label>
    <input type="text" name="busnumber" class="form-control" value="<?php echo htmlspecialchars($_SESSION["busnumber"]); ?>"  disabled>

    <label style="color:white;">Buscategory</label>
    <input type="text" name="buscategory" class="form-control" value="<?php echo htmlspecialchars($_SESSION["buscategory"]); ?>"  disabled>

    <label style="color:white;">Intial Place</label>
    <input type="text" name="inplace" class="form-control" value="<?php echo htmlspecialchars($_SESSION["inplace"]); ?>" disabled>

    <label style="color:white;">Destination Place</label>
    <input type="text" name="deplace" class="form-control" value="<?php echo htmlspecialchars($_SESSION["deplace"]); ?>" disabled>

    <label style="color:white;">Date</label>
    <input type="text" name="date" class="form-control" value="<?php echo htmlspecialchars($_SESSION["date"]); ?>" disabled>

    <label style="color:white;">Departuer</label>
    <input type="text" name="departime" class="form-control" value="<?php echo htmlspecialchars($_SESSION["departime"]); ?>" disabled>

    <label style="color:white;">Amount</label>
    <input type="text" name="amount" class="form-control" value="<?php echo htmlspecialchars($_SESSION["amount"]); ?>" disabled>

</div>
<center>
<div class="navbar navbar-inverse navbar-bottom" style="margin-top:80px; color:white;"><br>
<p>Live UR Life in Bangalore Days @</p>
</div>
</center>
    
</body>
</html>