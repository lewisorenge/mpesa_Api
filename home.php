<?php
$send=1;

$number=$_POST["number"];
$ammount=$_POST["ammount"];

if ($send=1) {

require_once('config/Constant.php');
require_once('lib/MpesaAPI.php');

$number="254791418641";
$ammount=10;

$PAYBILL_NO = "898998";
$MERCHENTS_ID = $PAYBILL_NO;
function generateRandomString() {
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$MERCHANT_TRANSACTION_ID = generateRandomString();

//Get the server address for callback
$host=gethostname();
$ip = gethostbyname($host);

//$Password=Constant::generateHash();
$Password='ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw==';
$mpesaclient=new MpesaAPI;

/**
 * Make payment
 */

$action=1;
if($action=1)
{
    //do your database operations here before making the request.
    //so i insert the transaction to DB at this point?
    //yeah. you will have to convicne the lecturers that it works.
    //Ok, supposing the transaction is set intentionally not to go through? The system should still insert?
    //for now yeah. since we are not using the actual paybill. we have no callback
    //just to clarify, allow me ask...so Mpesa shows we have transacted. But website gets no response correct?
    //yeah, we have no callback
    //maybe please say something about this callback, how should I get it?
    /*
        Callback Routes M-Pesa APIs are asynchronous. When a valid M-Pesa API request is received by the API Gateway, it is sent to M-Pesa where it is added to a queue. M-Pesa then processes the requests in the queue and sends a response to the API Gateway which then forwards the response to the URL registered in the CallBackURL or ResultURL request parameter. Whenever M-Pesa receives more requests than the queue can handle, M-Pesa responds by rejecting any more requests and the API Gateway sends a queue timeout response to the URL registered in the QueueTimeOutURL request parameter.
        OK, thank you very much. Have..a good day
        you welcome. Have a nice day too
        may be if i wanted to contact you on official/business reason, where can I reach you?
        Just call me, then we can arrange a meeting.
        Thank you, fine. Out now
    */
$mpesaclient->processCheckOutRequest($Password,$MERCHENTS_ID,$MERCHANT_TRANSACTION_ID,"Superior Highland Dairy",$ammount,$number,$ip);
}

else
{

	echo json_encode("No operation selected");
}

}else{
   echo json_encode("No data sent here meen");
}

?>