<?php
include('connect.php');
$response = array();
$dataarr = array();

if (isset($_POST))
{
    $email = $_POST['email'];

    $query1 = "SELECT * FROM complaint WHERE email='$email'";
    $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));

    if($result1)
    {
        while($data = $result1->fetch_assoc())
        {
            array_push($dataarr, $data);
       
        }
        $response['count'] = count($dataarr);
        $response['data'] = $dataarr;
        $response['status'] = 'success';
        $response['message'] = 'Send Successfully';
    }

    else
    {
        $response['count'] = '';
        $response['data'] = '';
        $response['status'] = 'error';
        $response['message'] = 'Failed to get data';
    }


}
else
{
    $response['data'] = '';
    $response['status'] = 'error';
    $response['message'] = 'Error Hitting API';

}
echo json_encode($response);
?>
