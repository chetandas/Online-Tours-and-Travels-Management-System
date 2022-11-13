<?php
session_start();
?>
    <script src="js/sweetalert.js"></script>
<?php
$username=$_POST['username'];
$pwd=$_POST['password'];
$msg="";
$conn=new mysqli("localhost","root","","users");
if($conn->connect_error)// if there is an error in correction
{
    die('Connection Failed :'.$conn->connect_error);// then display the error to the user
}
else
{
    $stmt=$conn->prepare("select * from regtable where username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows > 0)
    {
        $data=$stmt_result->fetch_assoc();
        if($data['password'] === $pwd)
        {
            // $_SESSION["username"]=$username;
            $_SESSION["logstatus"]=true;
            header('location:home.php');
        }
        else
        {
            $_SESSION['loginstatus']="Invalid password";
            $_SESSION['loginstatus']="error";
            header("location:loginform.php");
            // echo
            // "<script> alert('Invalid Password');</script>";
        }
    }
    else
    {
        $_SESSION['lstatus']="Something Went Wrong";
        $_SESSION['lstatus']="error";
        header("location:loginform.php");
    }
}
?>