<?php
session_start();
?>
    <script src="js/sweetalert.js"></script>
<?php
$fname=$lname=$age=$username=$email=$gender=$state=$phn=$pwd=$cpwd="";
$fname_err=$lname_err=$age_err=$username_err=$email_err=$gender_err=$state_err=$phn_err=$pwd_err=$cpwd_err="";
// connecting to the database
// session_start();
$conn=new mysqli('localhost','root','','users');
if($conn->connect_error)// if there is a connection in the error....
{
    die('Connection Failed:'.$conn->connect_error);// then display the error nd terminate the connection..
}
else
{
    if(empty(trim($_POST['firstname'])))//if user doesnt fill firstname then throw an error saying it cant be blank
    {
        $fname_err="First name cant be empty";
        echo "<script>alert('Firstname cant be empty');</script>";
    }
    else// if it is not empty...
    {
        $sql="select id from regtable where firstname=?";// select firstname from users table
        $stmt=mysqli_prepare($conn,$sql);// prepare a statement
        if($stmt)// if statement is prepared
        {
            mysqli_stmt_bind_param($stmt,"s",$param_firstname);// bind the firstname to statement and also bind it vth param
            // set the value of param
            $param_firstname=$_POST['firstname'];
            // now to execute the statement
            if(mysqli_stmt_execute($stmt))// if statement is executed then store the result in stmt
            {
                mysqli_stmt_store_result($stmt);
                $fname=$_POST['firstname'];// if everything is ok then store the firstname in fname
            }
            else// if fails to execute display error
            {
                $_SESSION['regstatus']="Registration Failed";
                $_SESSION['regstatus_code']="error";
                header('location:registrationform.php');
                // echo
                // "<script>alert('something went wrong');</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);// then finally close the statement
    if(empty(trim($_POST['lastname'])))//if user doesnt fill lastname then throw an error saying it cant be blank
    {
        $lname_err="Last name cant be empty";
        echo "<script>alert('Lastname cant be empty');</script>";
    }
    else// if it is not empty...
    {
        $sql="select id from regtable where lastname=?";// select username from users table
        $stmt=mysqli_prepare($conn,$sql);// prepare a statement
        if($stmt)// if statement is prepared
        {
            mysqli_stmt_bind_param($stmt,"s",$param_lastname);// bind the firstname to statement and also bind it vth param
            // set the value of param
            $param_lastname=$_POST['lastname'];
            // now to execute the statement
            if(mysqli_stmt_execute($stmt))// if statement is executed then store the result in stmt
            {
                mysqli_stmt_store_result($stmt);
                $lname=$_POST['lastname'];// if everything is ok then store the firstname in fname
            }
            else// if fails to execute display error
            {
                $_SESSION['regstatus']="Registration Failed";
                $_SESSION['regstatus_code']="error";
                header('location:registrationform.php');
                // echo
                // "<script>alert('something went wrong');</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);// then finally close the statement
    if(empty(trim($_POST['age'])))//if user doesnt fill age then throw an error saying it cant be blank
    {
        $age_err="Age cant be empty";
        echo "<script>alert('Firstname cant be empty');</script>";
    }
    else// if it is not empty...
    {
        $sql="select id from regtable where age=?";// select username from users table
        $stmt=mysqli_prepare($conn,$sql);// prepare a statement
        if($stmt)// if statement is prepared
        {
            mysqli_stmt_bind_param($stmt,"s",$param_age);// bind the firstname to statement and also bind it vth param
            // set the value of param
            $param_age=$_POST['age'];
            // now to execute the statement
            if(mysqli_stmt_execute($stmt))// if statement is executed then store the result in stmt
            {
                mysqli_stmt_store_result($stmt);
                $age=$_POST['age'];// if everything is ok then store the firstname in fname
            }
            else// if fails to execute display error
            {
                $_SESSION['regstatus']="Registration Failed";
                $_SESSION['regstatus_code']="error";
                header('location:registrationform.php');
                // echo
                // "<script>alert('something went wrong');</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);// then finally close the statement
    if(empty(trim($_POST['username'])))// if username block is empty
    {
        $username_err="username cant be empty";
        echo "<script>alert('Username cant be empty');</script>";
    }
    else// if username block is not empty
    {
        $sql="select id from regtable where username=?";// select the username from users database
        $stmt=mysqli_prepare($conn,$sql);//prepare the statement
        if($stmt)// if statement is prepared
        {
            mysqli_stmt_bind_param($stmt,"s",$param_username);
            // set the value of param
            $param_username=$_POST['username'];
            // now try to execute the statement
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                // now we check whether the username exists in the table or not
                if(mysqli_stmt_num_rows($stmt)==1)
                {
                    $username_err="this username is already taken";
                    // echo
                    // "<script>alert('something went wrong');</script>";
                    $_SESSION['userstatus']="username already taken";
                    $_SESSION['userstatus_code']="warning";
                    header("location:registrationform.php");
                }
                else// if it is not taken
                {
                    $username=$_POST['username'];// store the entered username in username variable

                }
            }
            else
            {
                $_SESSION['regstatus']="Registration Failed";
                $_SESSION['regstatus_code']="error";
                header('location:registrationform.php');
                // echo
                // "<script>alert('something went wrong');</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);// then finally close the statement
    if(empty(trim($_POST['email'])))// if email block is empty
    {
        $email_err="username cant be empty";
        echo "<script>alert('Username cant be empty');</script>";
    }
    else// if email block is not empty
    {
        $sql="select id from regtable where email=?";// select the username from users database
        $stmt=mysqli_prepare($conn,$sql);//prepare the statement
        if($stmt)// if statement is prepared
        {
            mysqli_stmt_bind_param($stmt,"s",$param_email);
            // set the value of param
            $param_email=$_POST['email'];
            // now try to execute the statement
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                // now we check whether the email exists in the table or not
                if(mysqli_stmt_num_rows($stmt)==1)
                {
                    $email_err="this email is already in use";
                    $_SESSION['emailstatus']="this email is already in use";
                    $_SESSION['emailstatus_code']="warning";
                    header('location:registrationform.php');
                    // echo
                    // "<script>alert('something went wrong');</script>";
                }
                else// if it is not taken
                {
                    $email=$_POST['email'];// store the entered email in email variable

                }
            }
            else
            {
                $_SESSION['regstatus']="Registration Failed";
                $_SESSION['regstatus_code']="error";
                header('location:registrationform.php');
                // echo "<script>alert('Something Went Wrong');</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);// then finally close the statement
    if(empty(trim($_POST['gender'])))//if user doesnt fill gender then throw an error saying it cant be blank
    {
        $gender_err="gender cant be empty";
        echo "<script>alert('Choose any Gender');</script>";
    }
    else// if it is not empty...
    {
        $sql="select id from regtable where gender=?";// select username from users table
        $stmt=mysqli_prepare($conn,$sql);// prepare a statement
        if($stmt)// if statement is prepared
        {
            mysqli_stmt_bind_param($stmt,"s",$param_gender);// bind the firstname to statement and also bind it vth param
            // set the value of param
            $param_gender=$_POST['gender'];
            // now to execute the statement
            if(mysqli_stmt_execute($stmt))// if statement is executed then store the result in stmt
            {
                mysqli_stmt_store_result($stmt);
                $gender=$_POST['gender'];// if everything is ok then store the firstname in fname
            }
            else// if fails to execute display error
            {
                $_SESSION['status']="something went wrong";
                $_SESSION['status_code']="error";
                header('location:registrationform.php');
                // echo
                // "<script>alert('something went wrong');</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);// then finally close the statement
    if(empty(trim($_POST['state'])))//if user doesnt select state then throw an error saying it cant be blank
    {
        $state_err="state cant be empty";
        echo "<script>alert('Choose Any State');</script>";
    }
    else// if it is not empty...
    {
        $sql="select id from regtable where state=?";// select username from users table
        $stmt=mysqli_prepare($conn,$sql);// prepare a statement
        if($stmt)// if statement is prepared
        {
            mysqli_stmt_bind_param($stmt,"s",$param_state);// bind the firstname to statement and also bind it vth param
            // set the value of param
            $param_state=$_POST['state'];
            // now to execute the statement
            if(mysqli_stmt_execute($stmt))// if statement is executed then store the result in stmt
            {
                mysqli_stmt_store_result($stmt);
                $state=$_POST['state'];// if everything is ok then store the firstname in fname
            }
            else// if fails to execute display error
            {
                $_SESSION['regstatus']="Registration Failed";
                $_SESSION['regstatus_code']="error";
                header('location:registrationform.php');
                // echo
                // "<script>alert('something went wrong');</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);// then finally close the statement
    if(empty(trim($_POST['phonenumber'])))//if user doesnt fill age then throw an error saying it cant be blank
    {
        $phn_err="phonenumber cant be empty";
        echo "<script>alert('Enter valid phonenumber');</script>";
    }
    else// if it is not empty...
    {
        $sql="select id from regtable where phonenumber=?";// select username from users table
        $stmt=mysqli_prepare($conn,$sql);// prepare a statement
        if($stmt)// if statement is prepared
        {
            mysqli_stmt_bind_param($stmt,"s",$param_number);// bind the firstname to statement and also bind it vth param
            // set the value of param
            $param_number=$_POST['phonenumber'];
            // now to execute the statement
            if(mysqli_stmt_execute($stmt))// if statement is executed then store the result in stmt
            {
                mysqli_stmt_store_result($stmt);
                $phn=$_POST['phonenumber'];// if everything is ok then store the firstname in fname
            }
            else// if fails to execute display error
            {
                $_SESSION['regstatus']="Registration Failed";
                $_SESSION['regstatus_code']="error";
                header('location:registrationform.php');
                // echo
                // "<script>alert('something went wrong');</script>";
            }
        }
    }
    mysqli_stmt_close($stmt);// then finally close the statement
    if(empty(trim($_POST['password'])))
    {
        $pwd_err="password cant be empty";
        echo "<script>alert('Password Cant be empty');</script>";
    }
    elseif(strlen(trim($_POST['password']))<5)
    {
        $pwd_err="password cant be less than 5 characters";
        $_SESSION['pwdstatus']="pwd cant be less than 5";
        $_SESSION['pwdstatus_code']="warning";
        header('location:registrationform.php');
        // echo
        // "<script>alert('something went wrong');</script>";
    }
    else// if it is not empty nd more than 5 characters store it pwd variable;
    {
        $pwd=$_POST['password'];
        $cpwd=$_POST['confirmpassword'];
    }
    // now check whether they are matching or not
    if(trim($_POST['password'])!=trim($_POST['confirmpassword']))
    {
        $pwd_err="password should match";
        $cpwd_err="password should match";
        $_SESSION['cpwdstatus']="pwd shld match";
        $_SESSION['cpwdstatus_code']="error";
        header('location:registrationform.php');
        // echo
        // "<script>alert('something went wrong');</script>";
    }
    // if there are no erros go ahead and insert the data into the database
    if(empty($fname_err) && empty($lname_err) && empty($age_err) && empty($username_err) && empty($email_err) && empty($gender_err) && empty($state_err) && empty($phn_err) && empty($pwd_err) && empty($cpwd_err))
    {
        $sql="insert into regtable(firstname,lastname,age,username,email,gender,state,phonenumber,password,confirmpassword) values(?,?,?,?,?,?,?,?,?,?)";
        $stmt=mysqli_prepare($conn,$sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"ssssssssss",$param_firstname,$param_lastname,$param_age,$param_username,$param_email,$param_gender,$param_state,$param_number,$param_pwd,$param_cpwd);
            // set the values of param
            $param_firstname=$_POST['firstname'];
            $param_lastname=$_POST['lastname'];
            $param_age=$_POST['age'];
            $param_username=$_POST['username'];
            $param_email=$_POST['email'];
            $param_gender=$_POST['gender'];
            $param_state=$_POST['state'];
            $param_number=$_POST['phonenumber'];
            $param_pwd=$_POST['password'];
            $param_cpwd=$_POST['confirmpassword'];
            if(mysqli_stmt_execute($stmt))
            {
                $_SESSION['status']="Registered Successfully";
                $_SESSION['status_code']="success";
                header('location:loginform.php');
            }
            else
            {
                $_SESSION['regstatus']="Registration Failed";
                $_SESSION['regstatus_code']="error";
                header('location:registrationform.php');
                // echo
                // "<script>alert('Something went wrong');</script>";
            }
        }
        mysqli_stmt_close($stmt);
    } 
}
$conn->close();
?>