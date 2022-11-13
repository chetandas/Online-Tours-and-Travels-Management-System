<script src="js/sweetalert.js"></script>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <script src="https://kit.fontawesome.com/9d67841aac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="logstyle.css">
    <script src="js/sweetalert.js"></script>
</head>
<body>
    <form action="login.php" method="post">
        <div class="container">
            <h1>Login Your Account</h1>
            <div class="b1">
                <i class="fa fa-envelope"></i>
                <input type="text" name="username" id="username" placeholder="Enter Your Username">
            </div>
            <div class="b1">
                <i class="fa fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Enter Your Password">
            </div>
            <button type="submit" class="btn" name="submit">Login</button>
            <p class="loginreg">Don't Have an Account? <a href="registrationform.php">Register Here</a></p>
        </div>
    </form>
    <?php
    if(isset($_SESSION['status']) && isset($_SESSION['status'])!='')
    {
        ?>
        <script>
            swal("Registered Successfully", "Login to Continue", "success");
        </script>
        <?php
        unset($_SESSION['status']);
    }
    else if(isset($_SESSION['loginstatus']) && isset($_SESSION['loginstatus'])!='')
    {
        ?>
        <script>
            swal("Invalid Password", "Please Re-enter The Password", "error");
        </script>
        <?php
        unset($_SESSION['loginstatus']);
    }
    else if(isset($_SESSION['lstatus']) && isset($_SESSION['lstatus'])!='')
    {
        ?>
        <script>
            swal("Invalid Username/Password", "Please Enter Valid Username/Password", "error");
        </script>
        <?php
        unset($_SESSION['lstatus']);
    }
    else if(isset($_SESSION['bookstatus']) && isset($_SESSION['bookstatus'])!='')
    {
        ?>
        <script>
            swal("Please Login To Your Account", "To Book Our packages", "info");
        </script>
        <?php
        unset($_SESSION['bookstatus']);
    }
    ?>
</body>
</html>
