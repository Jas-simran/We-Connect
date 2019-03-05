<?php
include('connect.php');
$response = array();

if (isset($_POST))
{
    $email = $_POST['email'];

    $query1 = "SELECT * FROM userdetails where email='$email'";
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));



    if($result1){

        while($data = $result1->fetch_assoc())
        {
            $response['data'] = $data;
        $response['status'] = 'success';
        $response['message'] = 'Send Successfully';
        }

    }

    else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to get data';
    }


    echo json_encode($response);
}
?>
