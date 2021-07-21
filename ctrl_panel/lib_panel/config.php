<?
include("class/class.php");

function SMS_Sender($mobile_number, $message_det)
{
//Your authentication key

//Multiple mobiles numbers separated by comma
$mobileNumber = $mobile_number;

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "ACTIVI";
$username="active";
$password="active@123";

//Your message to send, Add URL encoding here.
$message = ($message_det);

//Define route
$route = "default";
//Prepare you post parameters
$postData = array(
    'username' => $username,
    'pass' => $password,
    'senderid' => $senderId,
    'dest_mobileno' => $mobile_number,
    'message' => $message
);

//API URL
$url="http://sms.jhaveritechno.com/sms/user/urlsms.php?user=".$username."&password=".$password."&msisdn=".$mobileNumber."&sid=".$senderId."&msg=".$message;


// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;
}

?>
