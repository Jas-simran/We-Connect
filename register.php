<?php
session_start();
include('database.php');

if (isset($_POST['submit'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password= md5($_POST['password']);
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $area=$_POST['area'];
  $pincode=$_POST['pincode'];
  $wardno=$_POST['wardno'];
 
 $query = "INSERT INTO `userdetails` (name, email, password, address, phone, area, pincode, wardno) VALUES ('$name', '$email', '$password','$address', '$phone', '$area', '$pincode', '$wardno')";
    $result = mysqli_query($conn, $query);
    if($result){
        $smsg = "User Created Successfully.";
        echo '<script language="javascript">';
        echo "if(!alert('User Created Successfully.')) document.location = 'viewcomplaint.php'";
        echo '</script>';
        
    }else{
        $fmsg ="User Registration Failed";
         echo '<script language="javascript">';
        echo "if(!alert('User Registration Failed.')) document.location = 'signup.php'";
        echo '</script>';
    }

}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>We-Connect</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
           
            <h3>Register to Our System</h3>
            <form action="" class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control"  name="phone" placeholder="Contact No" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                 <div class="form-group">
                    <textarea class="form-control" placeholder="Address" name="address" required=""></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Area" name="area" required="">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Pincode" name="pincode" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Ward Number" name="wardno" required="">
                </div>

    
                <button type="submit" class="btn btn-primary block full-width m-b" name="submit" >Register</button>
                <div class="col-md-12" style="padding-top: 18px;">
                            Have An Account Already? <a href="index.php"> Login Here</a>
                        </div>
                
            </form>
          
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    </script>
</body>

</html>