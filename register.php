<?php

require_once "config.php";
 
$username = $email = $contact = $password = $confirm_password = "";
$username_err = $email_err = $contact_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    // username
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter a email";
    } else{
        $sql = "SELECT id FROM users WHERE useremail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
          
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            $param_email = trim($_POST["email"]);
            
            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Please try again later";
            }
        }  mysqli_stmt_close($stmt);
              
    }
    
     //email
     if(empty(trim($_POST["username"]))) {
        $username_err= "please enter the username";
    }else {
            $username=trim($_POST["username"]);
        }
        


      //contact       
      if(empty(trim($_POST["contact"]))){
        $contact_err = "please enter contact";
    }elseif(strlen(trim($_POST["contact"])) < 10){
        $contact_err = "contact must contain 10 digits";
    } elseif(strlen(trim($_POST["contact"])) > 10){
        $contact_err = "contact must contain 10 digits";
    } else {
        $contact=trim($_POST["contact"]);
     }


    // password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($username_err) && empty($email_err) && empty($contact_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username,useremail,contact, password) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
    
            mysqli_stmt_bind_param($stmt, "ssis", $param_username, $param_email, $param_contact,$param_password);
            
            $param_username = $username;
            $param_email = $email;
            $param_contact = $contact;
            $param_password = $password;

            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="image.png">

    <style type="text/css">
        body{
            background: url("bus.jpg") no-repeat center center fixed;
           -webkit-background-size:cover;
           -moz-background-size:cover;
           -o-background-size:cover;
            background-size: cover;

        }
        .form{
              width: 400px;
              background: rgba(0,0,0,0.5);
              margin: 12% auto;
              padding: 40px 0;
              color:white;
              box-shadow: 0 0 10px 10px rgba(0,0,0);
        }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <center>
    
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="" style="color:white;">Bangalore Days</a>
    </div>
    </div><br><br><br><br>
<div class="form">
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p >Please fill to create an account</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>"> 
                <label >Email</label>
                  <input type="email" name="email" placeholder="example@gmail.com" class="form-control" value="<?php echo $email; ?>" required>
                  <span class="help-block"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>"> 
                <label >Contact</label>
                  <input type="text" name="contact" placeholder="10 digit number" class="form-control" value="<?php echo $contact; ?>">
                  <span class="help-block"><?php echo $contact_err; ?></span>
            </div>


            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label >Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>  
</div>

<div class="navbar navbar-inverse navbar-bottom" style="margin-top:80px; color:white;"><br>
<p>Live UR Life in Bangalore Days @</p>
</div>

</body>
</html>