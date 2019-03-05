<?php
include('database.php');
session_start();
$role= $_SESSION['role'];
$id=$_SESSION['id'];
if (!isset($_SESSION['email'])) {
    echo '<script language="javascript">';
    echo "if(!alert('You should be logged in to access this page.')) document.location = 'index.php'";
    echo '</script>';
}

if (isset($_POST['submit']) && !isset($_GET['id'])) {
  date_default_timezone_get('Asia/Kolkata');
    $ccat=$_POST['ccat'];
    $catdesp= $_POST['catdesp'];
    $doc= date("Y-m-d"); 
         $target_dir = "uploads/";

            if ($_FILES['compimg']['name'] != "")
    {


        $stack = array();
        for ($i=0; $i<count($_FILES["compimg"]["name"]); $i++)
        {
            $image_file = $target_dir . basename($_FILES["compimg"]["name"][$i]);
            $iuploadOk = 1;


            $ifilename = trim(addslashes($image_file));

            $nimage_file = str_replace(' ', '_', $ifilename);

            $imageFileType = pathinfo($nimage_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists
            if (file_exists($nimage_file)) {
//            echo "Sorry, file already exists.";
                $iuploadOk = 0;
            }
// Allow certain file formats
            if($imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
//            echo "Sorry, only JPG files are allowed.";
                $iuploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($iuploadOk == 0) {
//            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["compimg"]["tmp_name"][$i], $nimage_file)) {
                    //echo "The file ". basename( $_FILES["imagesupload"]["name"][$i]). " has been uploaded.";
                    //echo "<br><br>";
                } else {
//                echo "Sorry, there was an error uploading your file.";
                }
            }



            $stack[] = $nimage_file;
        }

        /*$comma_separated = implode(",", $stack);

        print_r($stack);
    //    echo "<br><br>";
    //    echo $comma_separated;*/


        if (count($stack) < 1)
        {
            $compimg = 'no_data';

//        echo $imagesdata;
//        echo "<br><br>";
//        echo "<br><br>";
        }
        else
        {
            $temp_file = implode(",", $stack);
            $compimg = $temp_file;

//        print_r($stack);
//        echo "<br><br>";
//        echo $imagesdata;
//        echo "<br><br>";
        }
    }

     $cquery = "SELECT * FROM `userdetails` WHERE id='$id'";
        $cresult = mysqli_query($conn, $cquery) or die(mysqli_error($conn));
       while($cdata=$cresult->fetch_assoc()){
          $email=$cdata['email'];
          $address=$cdata['address'];
          $phone=$cdata['phone'];
          $area=$cdata['area'];
          $pincode=$cdata['pincode'];
          $wardno=$cdata['wardno'];
 

}
    $query = "INSERT INTO `complaint` (ccat, catdesp, compimg, email, address, phone, area, pincode, wardno, doc) VALUES ('$ccat', '$catdesp', '$compimg', '$email', '$address', '$phone', '$area', '$pincode', '$wardno', '$doc')";
    $result = mysqli_query($conn, $query);
    if($result){
        // $smsg = "Text Added Successfully.";
        echo '<script language="javascript">';
        echo "if(!alert('Complaint Added Successfully.')) document.location = 'addcomplaint.php'";
        echo '</script>';

    }else{
        // $fmsg ="Text Addition Failed";
        echo '<script language="javascript">';
        echo "if(!alert('Complaint Addition Failed.')) document.location = 'index.php'";
        echo '</script>';
    }

}


// $squery = "SELECT * FROM `complaint`";
// $sresult = mysqli_query($conn, $squery) or die(mysqli_error($conn));


if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $query1="SELECT * FROM complaint WHERE id=$id";
    $res=mysqli_query($conn,$query1) or die(mysqli_error($conn));
    $data=$res->fetch_assoc();
}

if (isset($_POST['submit']) && isset($_GET['id'])) {
    date_default_timezone_get('Asia/Kolkata');
    $ccat=$_POST['ccat'];
    $catdesp= $_POST['catdesp'];
    $date= date("Y-m-d"); 


         $target_dir = "uploads/";

         if ($_FILES['compimg']['name'] != "")
    {


        $stack = array();
        for ($i=0; $i<count($_FILES["compimg"]["name"]); $i++)
        {
            $image_file = $target_dir . basename($_FILES["compimg"]["name"][$i]);
            $iuploadOk = 1;


            $ifilename = trim(addslashes($image_file));

            $nimage_file = str_replace(' ', '_', $ifilename);

            $imageFileType = pathinfo($nimage_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists
            if (file_exists($nimage_file)) {
//            echo "Sorry, file already exists.";
                $iuploadOk = 0;
            }
// Allow certain file formats
            if($imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
//            echo "Sorry, only JPG files are allowed.";
                $iuploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($iuploadOk == 0) {
//            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["compimg"]["tmp_name"][$i], $nimage_file)) {
                    //echo "The file ". basename( $_FILES["imagesupload"]["name"][$i]). " has been uploaded.";
                    //echo "<br><br>";
                } else {
//                echo "Sorry, there was an error uploading your file.";
                }
            }



            $stack[] = $nimage_file;
        }

        /*$comma_separated = implode(",", $stack);

        print_r($stack);
    //    echo "<br><br>";
    //    echo $comma_separated;*/


        if (count($stack) < 1)
        {
            $compimg = 'no_data';

//        echo $imagesdata;
//        echo "<br><br>";
//        echo "<br><br>";
        }
        else
        {
            $temp_file = implode(",", $stack);
            $compimg = $temp_file;

//        print_r($stack);
//        echo "<br><br>";
//        echo $imagesdata;
//        echo "<br><br>";
        }
    }
      
    $query = "UPDATE `complaint` set  ccat='$ccat', catdesp='$catdesp', compimg='$compimg' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        // $smsg = "Record Updated Successfully.";
        echo '<script language="javascript">';
        echo 'if(!alert("Complaint Updated Successfully")) document.location = "viewcomplaint.php";';
        echo '</script>';


    }else{
        // $fmsg ="Record Updation Failed";
        echo '<script language="javascript">';
        echo 'if(!alert("Complaint Updation Failed")) document.location = "addcomplaint.php";';
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
                    <h2>Add Complaint</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                       
                        <li class="active">
                            <strong>Add Complaint</strong>
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
                            <h3>Add Complaint</h3>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                               
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group"><label class="col-sm-2 control-label">Complaint Category</label>

                                    <div class="col-sm-10"><select class="form-control m-b" name="ccat" value="<?php if(isset($_GET['id'])){echo $data['ccat']; } else{
          echo '';}?>" >
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                    </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                 
                                <div class="form-group"><label class="col-sm-2 control-label">Complaint Description</label>

                                    <div class="col-sm-10"><textarea name="catdesp" class="form-control"></textarea value="<?php if(isset($_GET['id'])){echo $data['catdesp']; } else{
          echo '';}?>"></div>
                                </div>
                                 <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                        <label class="col-sm-2 control-label">Image Upload</label>
                                        <div class="col-sm-10">      
                                                <input type="file" id="imgInp" title="Browse file" name="compimg[]" aria-describedby="fileHelp" multiple value="<?php if(isset($_GET['id'])){echo $data['compimg']['name']; } else{
          echo '';}?>">   
                                                <br><br>
                                                <!-- <img id="blah" src="#" alt="" style="width: 50%;"> -->
                                        </div>
                                    </div>

                   
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                       <center><button class="btn btn-primary" type="submit" name="submit">Submit</button></center> 
                                    </div>
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
