<?php
include('database.php');
session_start();
$role= $_SESSION['role'];
if (!isset($_SESSION['email'])) {
    echo '<script language="javascript">';
    echo "if(!alert('You should be logged in to access this page.')) document.location = 'index.php'";
    echo '</script>';
}
$email=$_SESSION['email'];
$query="SELECT * FROM complaint where email='$email'";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));


if (isset($_GET['id']) && isset($_GET['act'])) {
    $act=$_GET['act'];
    $id=$_GET['id'];
switch ($act) {
    case 'completed':
        $query1="UPDATE complaint SET status = '1' WHERE id = $id";
        $result2=mysqli_query($conn,$query1) or die(mysqli_error($conn));
        if($result2){
        //$smsg = "User Created Successfully.";
        echo '<script language="javascript">';
        echo "if(!alert('Complaint Work Completed!!')) document.location = 'viewcomplaint.php'";
        echo '</script>';
              
    }else{
        //$fmsg ="User Registration Failed";
        echo '<script language="javascript">';
        echo 'alert("Complaint Under Process!!")';
        echo '</script>';
    }

        break;
   case 'oapproval':
        $oquery="UPDATE complaint SET oapproval = '1' WHERE id = $id";
        $oresult=mysqli_query($conn,$oquery) or die(mysqli_error($conn));
        if($oresult){
        //$smsg = "User Created Successfully.";
        echo '<script language="javascript">';
        echo "if(!alert('Official Complaint Work Completed!!')) document.location = 'viewcomplaint.php'";
        echo '</script>';
              
    }else{
        //$fmsg ="User Registration Failed";
        echo '<script language="javascript">';
        echo 'alert("Complaint Under Process!!")';
        echo '</script>';
    }

         break;
         case 'uapproval':
        $uquery="UPDATE complaint SET uapproval = '1' WHERE id = $id";
        $uresult=mysqli_query($conn,$uquery) or die(mysqli_error($conn));
        if($uresult){
        //$smsg = "User Created Successfully.";
        echo '<script language="javascript">';
        echo "if(!alert('User Approval of Work Completed!!')) document.location = 'viewcomplaint.php'";
        echo '</script>';
              
    }else{
        //$fmsg ="User Registration Failed";
        echo '<script language="javascript">';
        echo 'alert("Complaint Under Process!!")';
        echo '</script>';
    }

         break;
          case "delete":
        $sql = "DELETE FROM complaint WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {

          echo '<script language="javascript">';
          echo "if(!alert('Record Deleted Successfully')) document.location = 'viewcomplaint.php'";
          echo '</script>';

        } else {
            echo '<script language="javascript">';
            echo 'alert("Error deleting record: " '. $conn->error.')';
            echo '</script>';
        }
        break;
    default:
      echo 'no result';
        break;
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

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<style>
    .label {

    font-family: 'Open Sans';
    font-size: 16px !important;
    font-weight: 600;
    padding: 3px 8px;
    line-height: 4em !important;
    text-shadow: none;
}
</style>
</head>

<body>

    <div id="wrapper">
<?php include('header.php'); ?>

        <div id="page-wrapper" class="gray-bg">
    <?php include('logout.php'); ?>
       <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>View Complaint</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                       
                        <li class="active">
                            <strong>View Complaint</strong>
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
                              <h3>View Complaint</h3>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                               
                            
                            </div>
                        </div>
                        <div class="ibox-content">

                             <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                                             placeholder="Search in table">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>

                                    <th data-toggle="true">ID</th>
                                    <th>Complaint Category</th>
                                    <th data-hide="all">Complaint Description</th>
                                    <th>Image</th>
                                    <th>Phone No</th>
                                    <th>Email Id</th>
                                    <th>Ward No</th>
                                    <th>Area</th>
                                    <th>Pincode</th>
                                    <th>Address</th>
                                    <th data-hide="all">Status</th>
                                    <th data-hide="all">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <?php
                                         $i = 1;
                                            while($result1=mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr class="tablerow<?php echo $result1['id'];?>">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $result1['ccat']; ?></td>
                                            <td><?php echo $result1['catdesp']; ?></td>
                                            <td> <?php
                                             echo "<img src=".$result1['compimg']." width=\"70\" height=\"70\">";
                                             // }
                         
                                         ?>
                                          </td>
                                         <td><?php echo $result1['phone']; ?></td>
                                         <td><?php echo $result1['email']; ?></td>

                                         <td><?php echo $result1['wardno']; ?></td>
                                         <td><?php echo $result1['area']; ?></td>
                                         <td><?php echo $result1['pincode']; ?></td>
                                         <td><?php echo $result1['address']; ?></td>
                                         <td><?php if ($result1['status']==0) { 
                                            echo '<a href="viewcomplaint.php?id='.$result1['id'].'&act=ongoing"><span class="label label-danger">Ongoing</span></a>';
                                         }
                                         else {
                                            echo '<a href="viewcomplaint.php?id='.$result1['id'].'&act=completed">  <span class="label label-primary">Completed</span></a>';
                                        }
                                        ?></td>      
                                         <td><?php if ($result1['status']==1) { 
                                           echo '<a href="viewcomplaint.php?id='.$result1['id'].'&act=delete" class="btn btn-outline btn-danger">Delete</a>';}
                                          else{
                                          echo '<a href="addcomplaint.php?id='.$result1['id'].'"><button class="btn btn-outline btn-success" type="button">Change</button></a>';
                                          echo '<a href="viewcomplaint.php?id='.$result1['id'].'&act=delete" class="btn btn-outline btn-danger">Delete</a>';
                                         }
                                          ?>
                                           
                                             
                                             <?php if ($result1['uapproval']==0) {  echo '<a href="viewcomplaint.php?id='.$result1['id'].'&act=uapproval"> <button type="button" class="btn btn-outline btn-info">User Approval</button></a>';
 $to = 'preetiyadav1906@gmail.com';
        $message = "Complaint has been successfully completed";
        $subject = "Mail From We Connect";
// Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
        $headers .= 'From: We Connect<support@demosite.com>' . "\r\n";

// Send email
        mail($to,$subject,$message,$headers);
                                         }
                                             else{

                                             }?>  
                                        </td>
                                                <?php $i++;?>
                                         <?php
                                             }

                                         ?>
                                        </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

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

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>
<!-- <script type="text/javascript">
        function confirmationEdit(anchor)
        {
            var conf = confirm('Are You Sure Want To Edit This Record?');
            if(conf)
                window.location=anchor.attr("href");
        }

        $(document).ready(function() {
            $('.delete').click(function() {
                var id = $(this).attr("id");
                if (confirm("Are You Sure Want To Delete This Record?")) {
                    $.ajax({
                        type: "POST",
                        url: "masterdelete.php",
                        data: 'id='+id+'&page=user',
                        cache: false,
                        success: function(html) {
                            $(".tablerow" + id).fadeOut('slow');
                            alert("Record Succesfully Deleted !!");
                        }
                    });
                } else {
                    return false;
                }
            });
        });
    </script>
 -->

</body>

</html>