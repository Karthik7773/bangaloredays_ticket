<?php

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome1.php");
    exit;
}

require_once "config.php";
 
$email = $password = "";
$email_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   //user
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email";
    } else{
        $email = trim($_POST["email"]);
    }
    
    //password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($email_err) && empty($password_err)){
        
        $sql = "SELECT id,username, useremail, password FROM users WHERE useremail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);
            
            $param_useremail = $email;
            
            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                   
                    mysqli_stmt_bind_result($stmt, $id,$username , $email,$password);
                    if(mysqli_stmt_fetch($stmt)){
                        session_start();
                        
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;   
                        $_SESSION["username"] = $username;                            
                        
                        header("location: welcome1.php");
                        
                    }
                } else{
                    $email_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}

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
    body{ font: 14px;}    
        .wrapper{ width: 350px;  padding: 20px; text-align:center; color : white;  }
        .form{
              width: 400px;
              background: rgba(0,0,0,0.5);
              margin: 12% auto;
              padding: 40px 0;
              color:white;
              box-shadow: 0 0 10px 10px rgba(0,0,0);
        }
    </style>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</head>
<body>
    <center>

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
                        <a class="navbar-brand" href=""></a><li><a href="admin.php"> Admin</a></li>
                    </ul>
                </div>
            </div>
     </div>
    <br><br><br>
    <div class="wrapper page-header">
        <h2>Login</h2>
        <p>Please fill to login</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    

    <div class="navbar navbar-inverse navbar-fixed-bottom" style="margin-top:80px; color:white;"><br>
<p>Live UR Life in Bangalore Days @</p>
</div>


</body>
</html>