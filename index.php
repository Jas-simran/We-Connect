<?php
session_start();
include('database.php');

if (isset($_POST['email']) and isset($_POST['password'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $tquery = "SELECT * FROM `userdetails` WHERE email='$email' and password='$password'";

    $tresult = mysqli_query($conn, $tquery) or die(mysqli_error($conn));
    $trow = $tresult->fetch_array(MYSQLI_NUM);
    $tcount = mysqli_num_rows($tresult);

    //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($tcount == 1){
        $_SESSION['id'] = $trow['0'];
        $_SESSION['email'] = $trow['2'];
        $_SESSION['role'] = $trow['9'];

        $role= $_SESSION['role'];
        switch ($role) {
            case "admin":
                echo '<script language="javascript">';
                echo "if(!alert('User Login Successfully !!')) document.location = 'allcomplaint.php'";
                echo '</script>';
                break;
            case "user":
                echo '<script language="javascript">';
                echo "if(!alert('User Login Successfully !!')) document.location = 'allcomplaint.php'";
                echo '</script>';
                break;
            case "wardofficer":
                echo '<script language="javascript">';
                echo "if(!alert('User Login Successfully !!')) document.location = 'wardofficer.php'";
                echo '</script>';
                break;
            case "corporator":
                echo '<script language="javascript">';
                echo "if(!alert('User Login Successfully !!')) document.location = 'corporator.php'";
                echo '</script>';

                break;
            case "division":
                echo '<script language="javascript">';
                echo "if(!alert('User Login Successfully !!')) document.location = 'division.php'";
                echo '</script>';

                break;
            case "mayor":
                echo '<script language="javascript">';
                echo "if(!alert('User Login Successfully !!')) document.location = 'mayor.php'";
                echo '</script>';
                break;
            case "commissioner":
                echo '<script language="javascript">';
                echo "if(!alert('User Login Successfully !!')) document.location = 'commissioner.php'";
                echo '</script>';
                break;


            default:
                echo "No Data Found";
        }
        // echo '<script language="javascript">';
        // echo "if(!alert('User Login Successfully !!')) document.location = 'allcomplaint.php'";
        // echo '</script>';
    }
    else{
        // If the login credentials doesn't match, he will be shown with an error message.
        $tfmsg = "Invalid Login Credentials.";


        echo '<script language="javascript">';
        echo "if(!alert('Invalid Login Credentials !!')) document.location = 'index.php'";
        echo '</script>';


    }
}
//end
$cdate= date('Y-m-d', strtotime("-8 days"));
//echo $cdate;
$query="SELECT * FROM complaint where doc = '$cdate' && uapproval='0'";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
while($result1=mysqli_fetch_assoc($result)){



  $to = 'preetiyadav1906@gmail.com';
  $message = "Complaint has been successfully completed";
  $message .= 'Complaint catagory : '.$result1['ccat'].'<br>';
  $message .= 'Complaint Description : '.$result1['catdesp'].'<br>';
  $message .= 'Complaint Image :  <img src="http://demo.letsweb.in/weconnect/'.$result1['compimg'].'"><br>';
  $message .= 'Email :  '.$result1['email'].'<br>';
  $message .= 'Address :  '.$result1['address'].'<br>';
  $message .= 'Phone : '.$result1['phone'].'<br>';
  $message .= 'Area : '.$result1['area'].'<br>';
  $message .= 'Pincode  : '.$result1['pincode'].'<br>';
  $message .= 'Wardno : '.$result1['wardno'].'<br>';
  $message .= 'Date Of Creation :  '.$result1['doc'].'<br>';

    $subject = "Mail From We Connect";
// Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
    $headers .= 'From: We Connect<support@letsweb.in>' . "\r\n";

// Send email
    mail($to,$subject,$message,$headers);
}

$cdate= date('Y-m-d', strtotime("-11 days"));
//echo $cdate;
$query="SELECT * FROM complaint where doc = '$cdate' && uapproval='0'";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
while($result1=mysqli_fetch_assoc($result)){



  $to = 'preetiyadav1906@gmail.com';
  $message = "Complaint has been successfully completed";
  $message .= 'Complaint catagory : '.$result1['ccat'].'<br>';
  $message .= 'Complaint Description : '.$result1['catdesp'].'<br>';
  $message .= 'Complaint Image :  <img src="http://demo.letsweb.in/weconnect/'.$result1['compimg'].'"><br>';
  $message .= 'Email : '.$result1['email'].'<br>';
  $message .= 'Address  : '.$result1['address'].'<br>';
  $message .= 'Phone : '.$result1['phone'].'<br>';
  $message .= 'Area : '.$result1['area'].'<br>';
  $message .= 'Pincode  : '.$result1['pincode'].'<br>';
  $message .= 'Wardno : '.$result1['wardno'].'<br>';
  $message .= 'Date Of Creation  : '.$result1['doc'].'<br>';

    $subject = "Mail From We Connect";
// Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
    $headers .= 'From: We Connect<support@letsweb.in>' . "\r\n";

// Send email
    mail($to,$subject,$message,$headers);
}

$cdate= date('Y-m-d', strtotime("-14 days"));
//echo $cdate;
$query="SELECT * FROM complaint where doc = '$cdate' && uapproval='0'";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
while($result1=mysqli_fetch_assoc($result)){



  $to = 'preetiyadav1906@gmail.com';
  $message = "Complaint has been successfully completed";
  $message .= 'Complaint catagory : '.$result1['ccat'].'<br>';
  $message .= 'Complaint Description : '.$result1['catdesp'].'<br>';
  $message .= 'Complaint Image :  <img src="http://demo.letsweb.in/weconnect/'.$result1['compimg'].'"><br>';
  $message .= 'Email  : '.$result1['email'].'<br>';
  $message .= 'Address :  '.$result1['address'].'<br>';
  $message .= 'Phone : '.$result1['phone'].'<br>';
  $message .= 'Area : '.$result1['area'].'<br>';
  $message .= 'Pincode  : '.$result1['pincode'].'<br>';
  $message .= 'Wardno : '.$result1['wardno'].'<br>';
  $message .= 'Date Of Creation : '.$result1['doc'].'<br>';

    $subject = "Mail From We Connect";
// Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
    $headers .= 'From: We Connect<support@letsweb.in>' . "\r\n";

// Send email
    mail($to,$subject,$message,$headers);
}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>


        <p>Welcome, Please Login</p>
        <form action="" class="m-t" role="form" method="post" >
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b" name="submit" >Login</button>
            <div class="col-md-6">
                <a href="#" class="btn btn-link btn-block">Not A member?</a>
            </div>
            <div class="col-md-6">

                <a href="register.php" class="btn btn-link btn-block">Register Now</a>
            </div>
        </form>

    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>

