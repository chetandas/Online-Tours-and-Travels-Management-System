<?php
session_start();
if($_SESSION["logstatus"] != true)
{
    $_SESSION['bookstatus']="please login first";
    $_SESSION['bookstatus_code']="info";
   header("location:loginform.php");
}
else
{
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $phn=$_POST['phonenumber'];
    $email=$_POST['email'];
    $ddate=$_POST['departuredate'];
    $adate=$_POST['arrivaldate'];
    $place=$_POST['place'];

    // selecting data from database according to the place he enters
    
    // first establish connection with the database
    $conn=new mysqli("localhost","root","","users");

    //choose the specific record as per the user i.e the place he enters
    $stmt=$conn->prepare("select * from places where location=?");

    // bind that record with the stmt
    $stmt->bind_param("s",$place);
    $stmt->execute();

    // then get the result
    $stmt_result=$stmt->get_result();
    // fetch the entire row
    $data=$stmt_result->fetch_assoc();
    
    // now make money as per the price of the package
    $money=$data['price'];


// so now before using gateway we need to include instamojo.php file...
    include ('instamojo\Instamojo.php');
    $api = new Instamojo\Instamojo('test_3bdb5504cb71086778fdda5939d', 'test_7e2f84dc50cd32325a39079c402',
        'https://test.instamojo.com/api/1.1/');

// for completing a payment request

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => "Room Booking",
            "amount" => $money,
            "send_email" => true,
            "email" => $email,
            "buyer_name"=> $fname,
            "phone"=> $phn,
            "send_sms"=> true,
            "allow_repeated_payments"=> true,
            "redirect_url" => "http://localhost/test/home.php"
        ));
        //print_r($response);
        $pay_url=$response['longurl'];
        header("location:$pay_url");
        }
        catch (Exception $e) {
        print('Error: ' . $e->getMessage());
        }
}
// $fname=$_POST['firstname'];
// $lname=$_POST['lastname'];
// $phn=$_POST['phonenumber'];
// $email=$_POST['email'];
// $ddate=$_POST['departuredate'];
// $adate=$_POST['arrivaldate'];

// // so now before using gateway we need to include instamojo.php file...
// include ('instamojo\Instamojo.php');
// $api = new Instamojo\Instamojo('test_3bdb5504cb71086778fdda5939d', 'test_7e2f84dc50cd32325a39079c402',
// 'https://test.instamojo.com/api/1.1/');

// // for completing a payment request

// try {
//     $response = $api->paymentRequestCreate(array(
//         "purpose" => "Room Booking",
//         "amount" => "7000",
//         "send_email" => true,
//         "email" => $email,
//         "buyer_name"=> $fname,
//         "phone"=> $phn,
//         "send_sms"=> true,
//         "allow_repeated_payments"=> true,
//         "redirect_url" => "http://localhost/test/welcome.php"
//         ));
//     //print_r($response);
//     $pay_url=$response['longurl'];
//     header("location:$pay_url");
//     }
//     catch (Exception $e) {
//      print('Error: ' . $e->getMessage());
//     }

?>