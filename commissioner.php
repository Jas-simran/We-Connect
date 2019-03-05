<?php
include('database.php');
session_start();
$role= $_SESSION['role'];
if (!isset($_SESSION['email'])) {
    echo '<script language="javascript">';
    echo "if(!alert('You should be logged in to access this page.')) document.location = 'index.php'";
    echo '</script>';
}
//$cdate= date('Y-m-d', strtotime("-18 days"));
//echo $cdate;
$query="SELECT * FROM complaint";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));


if (isset($_GET['id']) && isset($_GET['act'])) {
    $act=$_GET['act'];
    $id=$_GET['id'];
switch ($act) {
          case "delete":
        $sql = "DELETE FROM complaint WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {

          echo '<script language="javascript">';
          echo "if(!alert('Record Deleted Successfully')) document.location = 'viewcompliant.php'";
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
                                    <th>ComplaintDate</th>
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
                                         <td><?php echo $result1['doc']; ?></td>
                                         <td><?php if ($result1['status']==0) { 
                                            echo '<a href="commissioner.php?id='.$result1['id'].'&act=ongoing"><span class="label label-danger">Ongoing</span></a>';
                                         }
                                         else {
                                            echo '<a href="commissioner.php?id='.$result1['id'].'&act=completed">  <span class="label label-primary">Completed</span></a>';
                                        }
                                        ?></td>      
                                              <td>

                                            <?php echo '<a href="commissioner.php?id='.$result1['id'].'&act=delete" class="btn btn-outline btn-danger">Delete</a>';?>
                                             
                                             <?php if ($result1['oapproval']==0) {  echo '<a href="commissioner.php?id='.$result1['id'].'&act=oapproval"> <button type="button" class="btn btn-outline btn-warning">Official Approval</button></a>';
                                         }
                                             else{

                                             }
                                                if ($result1['uapproval']==0) {  echo '<a href="commissioner.php?id='.$result1['id'].'&act=uapproval"> <button type="button" class="btn btn-outline btn-info">User Approval</button></a>';
                                         }
                                             else{

                                             }
                                             ?>  
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
                        data: 'id='+id+'&page=commissioner',
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
    </script> -->

</body>

</html>