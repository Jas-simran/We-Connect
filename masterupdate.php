<?php
session_start();
// connect to the database
include('database.php');

if (isset($_GET['id']) && isset($_GET['act'])) {
    $act=$_GET['act'];
    $id=$_GET['id'];
    $page=$_GET['page'];


    switch ($act) {
       
        case 'oapproval':
            $oquery="UPDATE complaint SET oapproval = '1' WHERE id = $id";
            $oresult=mysqli_query($conn,$oquery) or die(mysqli_error($conn));
            if($oresult){
                //$smsg = "User Created Successfully.";
                echo '<script language="javascript">';
                echo "if(!alert('Official Complaint Work Completed!!')) document.location = '".$page."'";
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
                echo "if(!alert('User Approval of Work Completed!!')) document.location = '".$page."'";
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
                echo "if(!alert('Record Deleted Successfully')) document.location = '".$page."'";
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

    $query="SELECT * FROM complaint";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
$result1=mysqli_fetch_assoc($result);
$oapproval= $result1['oapproval'];
$uapproval= $result1['uapproval'];
if($oapproval==1&&$uapproval==1)
{
            $squery="UPDATE complaint SET status = '1' WHERE id = $id";
            $sresult=mysqli_query($conn,$squery) or die(mysqli_error($conn));
}
}


?>