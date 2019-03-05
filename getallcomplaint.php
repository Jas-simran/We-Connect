<?php
include('connect.php');
$response = array();



    $query1 = "SELECT * FROM userdetails where email='$email'";
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));



    if($result1){

        while($data = $result1->fetch_assoc())
        {
            $response[] = $data;
        }

    }

    else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to get data';
    }


    echo json_encode($response);

?>
