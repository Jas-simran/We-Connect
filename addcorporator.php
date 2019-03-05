<?php
include('database.php');
session_start();
$role= $_SESSION['role'];

if (isset($_POST['submit']) && !isset($_GET['id'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password= md5($_POST['password']);
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $area=$_POST['area'];
  $pincode=$_POST['pincode'];
  $wardno=$_POST['wardno'];
  $role='corporator';
 
 $query = "INSERT INTO `userdetails` (name, email, password, address, phone, area, pincode, wardno, role) VALUES ('$name', '$email', '$password','$address', '$phone', '$area', '$pincode', '$wardno', '$role')";
    $result = mysqli_query($conn, $query);
    if($result){
        $smsg = "User Created Successfully.";
        echo '<script language="javascript">';
        echo "if(!alert('Cooperator Added Successfully.')) document.location = 'viewcorporator.php'";
        echo '</script>';
        
    }else{
        $fmsg ="User Registration Failed";
         echo '<script language="javascript">';
        echo "if(!alert('Cooperator Addition Failed.')) document.location = 'addcorporator.php'";
        echo '</script>';
    }

}
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query1="SELECT * FROM userdetails WHERE id=$id";
    $res=mysqli_query($conn,$query1) or die(mysqli_error($conn));
    $data=$res->fetch_assoc();
}

if (isset($_POST['submit']) && isset($_GET['id'])) {
   $name=$_POST['name'];
  $email=$_POST['email'];
  $password= md5($_POST['password']);
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $area=$_POST['area'];
  $pincode=$_POST['pincode'];
  $wardno=$_POST['wardno'];
  $role='corporator';


        
    $query = "UPDATE `userdetails` set  name='$name', email='$email', password='$password', address='$address', phone='$phone', area='$area', pincode='$pincode', wardno='$wardno', role='$role' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        // $smsg = "Record Updated Successfully.";
        echo '<script language="javascript">';
        echo 'if(!alert("Cooperator Data Updated Successfully")) document.location = "viewcorporator.php";';
        echo '</script>';


    }else{
        // $fmsg ="Record Updation Failed";
        echo '<script language="javascript">';
        echo 'if(!alert("Cooperator Data Updation Failed")) document.location = "addcorporator.php";';
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

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

     <?php include('header.php'); ?>

        <div id="page-wrapper" class="gray-bg">
    
          <?php include('logout.php'); ?>
             <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add Co-operator</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                       
                        <li class="active">
                            <strong>Add Co-operator</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
   
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3>Add Co-operator</h3>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                               
                            </div>
                        </div>
                        <div class="ibox-content">
                           <form action="" class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" required=""  value="<?php if(isset($_GET['id'])){echo $data['name']; } else{
          echo '';}?>">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control"  name="phone" placeholder="Contact No" required=""  value="<?php if(isset($_GET['id'])){echo $data['phone']; } else{
          echo '';}?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required=""  value="<?php if(isset($_GET['id'])){echo $data['email']; } else{
          echo '';}?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required=""  value="<?php if(isset($_GET['id'])){echo $data['password']; } else{
          echo '';}?>">
                </div>
                 <div class="form-group">
                    <textarea class="form-control" placeholder="Address" name="address" required=""><?php if(isset($_GET['id'])){echo $data['address']; } else{
          echo '';}?></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Area" name="area" required=""  value="<?php if(isset($_GET['id'])){echo $data['area']; } else{
          echo '';}?>">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Pincode" name="pincode" required=""  value="<?php if(isset($_GET['id'])){echo $data['pincode']; } else{
          echo '';}?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Ward Number" name="wardno" required=""  value="<?php if(isset($_GET['id'])){echo $data['wardno']; } else{
          echo '';}?>">
                </div>

    
                <button type="submit" class="btn btn-primary block full-width m-b" name="submit" >Add Cooperator</button>
                <div class="col-md-12" style="padding-top: 18px;">
                        </div>
                
            </form>
          
                        </div>
                    </div>
                </div>
            </div>
        </div>
     

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
<script>
           function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
        </script>

   
</body>

</html>