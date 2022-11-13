<script src="js/sweetalert.js"></script>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="regstyle.css">
    <script src="js/sweetalert.js"></script>
</head>
<body>
    <div class="main">
        <div class="register">
            <h2>Register Here</h2>
            <form id="register" action="register.php" method="post">
                <label>First Name : </label>
                <br>
                <input type="text" name="firstname" id="name" placeholder="Enter Your First Name" required>
                <br><br>
                <label>Last Name : </label>
                <br>
                <input type="text" name="lastname" id="name" placeholder="Enter Your Last Name" required>
                <br><br>
                <label >Your Age : </label>
                <br>
                <input type="text" name="age" id="name" placeholder="How Old Are You?" required>
                <br><br>
                <label >Username :</label>
                <br>
                <input type="text" name="username" id="name" placeholder="Enter Username" required>
                <br><br>
                <label >Email : </label>
                <br>
                <input type="email" name="email" id="name" placeholder="Enter Your Email Address" required>
                <br><br>
                <label>Gender : </label>
                <br>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" id="male" value="m" required>
                &nbsp;
                <span id="male">Male</span>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" id="female" value="f" required>
                &nbsp;
                <span id="female">Female</span>
                <br><br>
                <label>State : </label>
                <br>
                <select id="name" name="state" required>
                    <option value="">Select</option>
                    <option value="AN">Andaman and Nicobar Islands</option>
                    <option value="AP">Andhra Pradesh</option>
                    <option value="AR">Arunachal Pradesh</option>
                    <option value="AS">Assam</option>
                    <option value="BR">Bihar</option>
                    <option value="CH">Chandigarh</option>
                    <option value="CT">Chhattisgarh</option>
                    <option value="DN">Dadra and Nagar Haveli</option>
                    <option value="DD">Daman and Diu</option>
                    <option value="DL">Delhi</option>
                    <option value="GA">Goa</option>
                    <option value="GJ">Gujarat</option>
                    <option value="HR">Haryana</option>
                    <option value="HP">Himachal Pradesh</option>
                    <option value="JK">Jammu and Kashmir</option>
                    <option value="JH">Jharkhand</option>
                    <option value="KA">Karnataka</option>
                    <option value="KL">Kerala</option>
                    <option value="LA">Ladakh</option>
                    <option value="LD">Lakshadweep</option>
                    <option value="MP">Madhya Pradesh</option>
                    <option value="MH">Maharashtra</option>
                    <option value="MN">Manipur</option>
                    <option value="ML">Meghalaya</option>
                    <option value="MZ">Mizoram</option>
                    <option value="NL">Nagaland</option>
                    <option value="OR">Odisha</option>
                    <option value="PY">Puducherry</option>
                    <option value="PB">Punjab</option>
                    <option value="RJ">Rajasthan</option>
                    <option value="SK">Sikkim</option>
                    <option value="TN">Tamil Nadu</option>
                    <option value="TG">Telangana</option>
                    <option value="TR">Tripura</option>
                    <option value="UP">Uttar Pradesh</option>
                    <option value="UT">Uttarakhand</option>
                    <option value="WB">West Bengal</option>
                </select>
                <br><br>
                <label >Phone Number : </label>
                <br>
                <input type="phonenumber" id="name" name="phonenumber" placeholder="Enter Your Mobile Number" required>
                <br><br>
                <label>Password : </label>
                <br>
                <input type="password" name="password"
                id="name" placeholder="Enter Your Password" required>
                <br><br>
                <label >Confirm Password : </label>
                <br>
                <input type="password" name="confirmpassword" id="name" placeholder="Confirm Your Password" required>
                <br><br>
                <input type="Submit" value="Submit" name="Submit" id="submit">
                <p class="loginreg">Have an Account? <a href="loginform.php">Login Here</a></p>
            </form>
        </div>
    </div>
    <?php
    if(isset($_SESSION['userstatus']) && isset($_SESSION['userstatus'])!='')
    {
        ?>
        <script>
            swal("Username is Already Taken", "Please Choose Another Username", "warning");
        </script>
        <?php
        unset($_SESSION['userstatus']);
    }
    else if(isset($_SESSION['emailstatus']) && isset($_SESSION['emailstatus'])!='')
    {
        ?>
        <script>
            swal("Email is Already Taken", "Please Enter Another Email Address", "warning");
        </script>
        <?php
        unset($_SESSION['emailstatus']);
    }
    else if(isset($_SESSION['pwdstatus']) && isset($_SESSION['pwdstatus'])!='')
    {
        ?>
        <script>
            swal("Password Can't Be Less Than 5 Characters", "Please re-enter valid passowrd", "warning");
        </script>
        <?php
        unset($_SESSION['pwdstatus']);
    }
    else if(isset($_SESSION['cpwdstatus']) && isset($_SESSION['cpwdstatus'])!='')
    {
        ?>
        <script>
            swal("Passwords Don't Match", "Please Enter Valid password", "error");
        </script>
        <?php
        unset($_SESSION['cpwdstatus']);
    }
    else if(isset($_SESSION['regstatus']) && isset($_SESSION['regstatus'])!='')
    {
        ?>
        <script>
            swal("Something Went Wrong", "Please Enter Your Credentials Again", "error");
        </script>
        <?php
        unset($_SESSION['regstatus']);
    }
    ?>
</body>
</html>