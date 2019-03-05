<?php
include('connect.php');
$response = array();

if (isset($_POST))
{
    $email = $_POST['email'];
    $id = $_POST['id'];

    $query1 = "DELETE FROM complaint WHERE id='$id'";
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));

    if($result1){

            $response['status'] = 'success';
            $response['message'] = 'Complaint Deleted Successfully';
    }
    else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to Delete Complaint';
    }


}
else{
    $response['status'] = 'error';
    $response['message'] = 'Error Hitting API';
}

echo json_encode($response);
?>
