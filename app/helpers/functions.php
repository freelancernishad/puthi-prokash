<?php

use App\Models\Cart;
use App\Models\Sonod;
use App\Models\Gallery;
use App\Models\Visitor;
use App\Models\Category;
use App\Models\Uniouninfo;
use App\Models\Sonodnamelist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;




    function makeshorturl($url){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://uniontax.xyz/make/url?short_url=$url",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',

));

 return $response = curl_exec($curl);

curl_close($curl);
    }

    function pushNotification($data){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$data,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: key=AAAA-EA0BlM:APA91bEjaymOOGtnp1u9K7RymKyswgYqkI390pCj2R63ritYAHWmYbdI5D9O9h7XB6G6ADa3Nk9sZg9SDCWkwreJnrvcjGGOEI6_euAbgHezKblGxD68_CJEZdLOhyfafJ0u4ZKxQD9D'
  ),
));

 $response = curl_exec($curl);

curl_close($curl);
    }




    // function sitedetails(){
    //     $url = url()->current();

    //     $domain =  explode('//',$url);
    //      $subdomain =  explode('.', $domain[1]);
    //      $subdomainCount =  count($subdomain);
    //      if($subdomainCount>1){

    //          $uniounDetials =  Uniouninfo::where(['short_name_e'=>$subdomain[0]])->first();
    //          return view('frontlayout',compact('uniounDetials'));

    //         }else{
    //             // return  Uniouninfo::find(1);
    //      $uniounDetials['defaultColor']  = 'green';

    //           $uniounDetials = json_decode(json_encode($uniounDetials));

    //          return view('frontlayout',compact('uniounDetials'));

    //      }

    // }

    function ekpayToken($trnx_id=123456789,$trnx_amt=0,$cust_info=[],$path='payment'){


        $req_timestamp = date('Y-m-d H:i:s');


        $Apiurl = 'https://pg.ekpay.gov.bd/ekpaypg/v1';
        $url = 'https://www.esspmtetulia.gov.bd';

        $whitelistip = '198.54.114.109';
       $req_timestamp = date('Y-m-d H:i:s');

     $AKPAY_MER_REG_ID = 'tetulia_sechsheba_mer';
    $AKPAY_MER_PASS_KEY = 'sI8^Q2##';




        $post = [
           'mer_info' => [
              "mer_reg_id" => "$AKPAY_MER_REG_ID",
              "mer_pas_key" => "$AKPAY_MER_PASS_KEY"
           ],
           "req_timestamp" => "$req_timestamp GMT+6",
           "feed_uri" => [
              "c_uri" => "$url/$path/cancel",
              "f_uri" => "$url/$path/fail",
              "s_uri" => "$url/$path/success"
           ],
           "cust_info" => $cust_info,
           "trns_info" => [
              "ord_det" => "Payment for sonod",
              "ord_id" => "$trnx_id",
              "trnx_amt" => $trnx_amt,
              "trnx_currency" => "BDT",
              "trnx_id" => "$trnx_id"
           ],
           "ipn_info" => [
              "ipn_channel" => "3",
              "ipn_email" => "freelancernishad123@gmail.com",
              "ipn_uri" => "$url/api/ipn"
           ],
           "mac_addr" => "$whitelistip"
        ];

        // 148.163.122.80
        $post = json_encode($post);

        Log::info($post);

        $ch = curl_init("$Apiurl/merchant-api");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);
        curl_close($ch);

   /*      echo '<pre>';
        print_r($response); */

         $response = json_decode($response);

        $sToken =  $response->secure_token;


        return "$Apiurl?sToken=$sToken&trnsID=$trnx_id";

    //  return    'https://sandbox.ekpay.gov.bd/ekpaypg/v1?sToken=eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJla3BheWNvcmUiLCJhdXRoIjoiUk9MRV9NRVJDSEFOVCIsImV4cCI6MTU0NTMyMjcxMn0.lqjBuvtqyUbhy4pteKa0IaqpjYQoEDjjnJWSFwcv0Ho2JJHN-8xqr8Q7r-tIJUy_dLajS2XbmrR6lBGrlGFYhQ&trnsID=1234'


    //   return "https://sandbox.ekpay.gov.bd/ekpaypg/v1?sToken=$sToken&trnsID=$trnx_id";

    }






function int_en_to_bn($number)
{

    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
    $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    return str_replace($en_digits, $bn_digits, $number);
}
function int_bn_to_en($number)
{

    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
    $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    return str_replace($bn_digits, $en_digits, $number);
}


function month_en_to_bn($month)
{

    $bn_month = array('জানুয়ারি', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগষ্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
    $en_month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');


    return str_replace($en_month, $bn_month, $month);
}

function month_to_number($month)
{
    $monthName = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $monthNumber = array(1,2,3,4,5,6,7,8,9,10,11,12);
    return str_replace($monthName, $monthNumber, $month);
}

function day_en_to_bn($day)
{

    $bn_month = array('শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার ', 'শুক্রবার');
    $en_month = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');


    return str_replace($en_month, $bn_month, $day);
}




    function visitor(){
        $ip =  $_SERVER['REMOTE_ADDR'];

        $visitorWhere = [
            'ip'=>$ip,
            'date'=>date('d-m-Y'),
        ];

     $Visitor = Visitor::where($visitorWhere)->count();
      if($Visitor>0){

      }else{

          $datainsert = [
              'ip'=>$ip,
              'date'=>date('d-m-Y'),
              'month'=>date('F'),
              'year'=>date('Y'),
          ];
          Visitor::create($datainsert);
      }
    }





function sent_response($message,$data=[]){
    $response = [
        'status'=>true,
        'message'=>$message,
        'data'=>$data,
    ];
    return response()->json([$response]);

}

function sent_error($message ,$messages=[],$code=404){
    $response = [
        'status'=>false,
        'message'=>$message,
        'code'=>$code
    ];
    !empty($messages) ? $response['errors'] = $messages : null;


    return response()->json(['response'=>$response],$code);

}





function base642($Image)
{
    $url = $Image;
    $image = file_get_contents($url);
    if ($image !== false){
        return 'data:image/jpg;base64,'.base64_encode($image);

    }
}

function base64URL($Image)
{
//  return $Image;


        $Image= $Image;


$ext =  pathinfo($Image, PATHINFO_EXTENSION);
    return $b64image = "data:image/$ext;base64,".base64_encode(file_get_contents($Image));
}
function base64($Image=null)
{



    if($Image=='' || $Image==null){
        $Image= env('FILE_PATH').'backend/image.png';
    }else{
          if(File::exists(env('FILE_PATH').$Image)){
            $Image= env('FILE_PATH').$Image;
        }else{
            $Image= env('FILE_PATH').'backend/image.png';
        }
    }

$ext =  pathinfo($Image, PATHINFO_EXTENSION);;
    return $b64image = "data:image/$ext;base64,".base64_encode(file_get_contents($Image));
}

 function fileupload($Image,$path,$width='',$height='',$customname='')
{
    $Y = date('Y');
    $m = date('m');
    $d = date('d');
    $path = $path."$Y/$m/$d/";
 // same file server
 if (!file_exists(env('FILE_PATH').$path)) {
    File::makeDirectory(env('FILE_PATH').$path, 0777, true, true);
}

 $position = strpos($Image, ';');
$sub = substr($Image, 0, $position);
$ext = explode('/', $sub)[1];
$random = rand(10000,99999);
if($customname!=''){
$name = time().'____'.$customname.'.'.$ext;
}else{
$name = time().'____'.$random.'.'.$ext;
}
$upload_path = $path;
$image_url = $upload_path.$name;

if($width=='' && $height==''){

    $img = Image::make($Image);
}else{

    $img = Image::make($Image)->resize($width, $height);
}

 $img->save(env('FILE_PATH').$image_url);
 return $image_url;

    // separate file server
// $url = env('FILE_SERVER');
// $curl = curl_init($url);
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_POST, true);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// // $headers = array(
// //    "Content-Type: application/json",
// // );
// // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
// $data = ["files"=> $Image,'customname'=>$customname,'path'=>$path,'width'=>$width,'height'=>$height];
// curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// $resp = curl_exec($curl);
// curl_close($curl);
// return json_decode($resp);

}

    function allfileupload($Image,$path,$width='',$height='',$customname='') {


        $Y = date('Y');
        $m = date('m');
        $d = date('d');
        $path = $path."$Y/$m/$d/";
     // same file server
        if (!file_exists(env('FILE_PATH').$path)) {
            File::makeDirectory(env('FILE_PATH').$path, 0777, true, true);
        }
        $position = strpos($Image, ';');
        $sub = substr($Image, 0, $position);
        $ext = explode('/', $sub)[1];
        $random = rand(10000,99999);
        if($customname!=''){
        $name = time().'____'.$customname.'.'.$ext;
        }else{
        $name = time().'____'.$random.'.'.$ext;
        }
        $upload_path = $path;
        $image_url = $upload_path.$name;



    
    }



 function fileuploadURL($Image,$path,$width='',$height='',$customname='')
{
 // same file server
 if (!file_exists(env('FILE_PATH').$path)) {
    File::makeDirectory(env('FILE_PATH').$path, 0777, true, true);
}

 $position = strpos($Image, ';');
$sub = substr($Image, 0, $position);
$ext = explode('/', $sub)[1];
$random = rand(10000,99999);
if($customname!=''){
$name = time().'____'.$customname.'.'.$ext;
}else{
$name = time().'____'.$random.'.'.$ext;
}
$upload_path = $path;
$image_url = $upload_path.$name;

if($width=='' && $height==''){

    $img = Image::make($Image);
}else{

    $img = Image::make($Image)->resize($width, $height);
}

 $img->save(env('FILE_PATH').$image_url);
 return asset($image_url);

}














///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// echo     $apiKey  = API_KEY;

define("SERVER", "https://bulksms.brotherit.net");
define("API_KEY", "2668e548a3250c3e4126e2e2c830d2797084f918");
//  define("API_KEY", "$apiKey");


define("USE_SPECIFIED", 0);
define("USE_ALL_DEVICES", 1);
define("USE_ALL_SIMS", 2);

/**
 * @param string     $number      The mobile number where you want to send message.
 * @param string     $message     The message you want to send.
 * @param int|string $device      The ID of a device you want to use to send this message.
 * @param int        $schedule    Set it to timestamp when you want to send this message.
 * @param bool       $isMMS       Set it to true if you want to send MMS message instead of SMS.
 * @param string     $attachments Comma separated list of image links you want to attach to the message. Only works for MMS messages.
 * @param bool       $prioritize  Set it to true if you want to prioritize this message.
 *
 * @return array     Returns The array containing information about the message.
 * @throws Exception If there is an error while sending a message.
 */
function sendSingleMessage($number, $message, $device = 0, $schedule = null, $isMMS = false, $attachments = null, $prioritize = false)
{
    $url = SERVER . "/services/send.php";
    $postData = array(
        'number' => $number,
        'message' => $message,
        'schedule' => $schedule,
        'key' => API_KEY,
        'devices' => $device,
        'type' => $isMMS ? "mms" : "sms",
        'attachments' => $attachments,
        'prioritize' => $prioritize ? 1 : 0
    );
    return sendRequest($url, $postData)["messages"][0];
}

/**
 * @param array  $messages        The array containing numbers and messages.
 * @param int    $option          Set this to USE_SPECIFIED if you want to use devices and SIMs specified in devices argument.
 *                                Set this to USE_ALL_DEVICES if you want to use all available devices and their default SIM to send messages.
 *                                Set this to USE_ALL_SIMS if you want to use all available devices and all their SIMs to send messages.
 * @param array  $devices         The array of ID of devices you want to use to send these messages.
 * @param int    $schedule        Set it to timestamp when you want to send these messages.
 * @param bool   $useRandomDevice Set it to true if you want to send messages using only one random device from selected devices.
 *
 * @return array     Returns The array containing messages.
 *                   For example :-
 *                   [
 *                      0 => [
 *                              "ID" => "1",
 *                              "number" => "+11234567890",
 *                              "message" => "This is a test message.",
 *                              "deviceID" => "1",
 *                              "simSlot" => "0",
 *                              "userID" => "1",
 *                              "status" => "Pending",
 *                              "type" => "sms",
 *                              "attachments" => null,
 *                              "sentDate" => "2018-10-20T00:00:00+02:00",
 *                              "deliveredDate" => null
 *                              "groupID" => ")V5LxqyBMEbQrl9*J$5bb4c03e8a07b7.62193871"
 *                           ]
 *                   ]
 * @throws Exception If there is an error while sending messages.
 */
function sendMessages($messages, $option = USE_SPECIFIED, $devices = [], $schedule = null, $useRandomDevice = true)
{
    $url = SERVER . "/services/send.php";
    $postData = [
        'messages' => json_encode($messages),
        'schedule' => $schedule,
        'key' => API_KEY,
        'devices' => json_encode($devices),
        'option' => $option,
        'useRandomDevice' => $useRandomDevice
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param int    $listID      The ID of the contacts list where you want to send this message.
 * @param string $message     The message you want to send.
 * @param int    $option      Set this to USE_SPECIFIED if you want to use devices and SIMs specified in devices argument.
 *                            Set this to USE_ALL_DEVICES if you want to use all available devices and their default SIM to send messages.
 *                            Set this to USE_ALL_SIMS if you want to use all available devices and all their SIMs to send messages.
 * @param array  $devices     The array of ID of devices you want to use to send the message.
 * @param int    $schedule    Set it to timestamp when you want to send this message.
 * @param bool   $isMMS       Set it to true if you want to send MMS message instead of SMS.
 * @param string $attachments Comma separated list of image links you want to attach to the message. Only works for MMS messages.
 *
 * @return array     Returns The array containing messages.
 * @throws Exception If there is an error while sending messages.
 */
function sendMessageToContactsList($listID, $message, $option = USE_SPECIFIED, $devices = [], $schedule = null, $isMMS = false, $attachments = null)
{
    $url = SERVER . "/services/send.php";
    $postData = [
        'listID' => $listID,
        'message' => $message,
        'schedule' => $schedule,
        'key' => API_KEY,
        'devices' => json_encode($devices),
        'option' => $option,
        'type' => $isMMS ? "mms" : "sms",
        'attachments' => $attachments
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param int $id The ID of a message you want to retrieve.
 *
 * @return array     The array containing a message.
 * @throws Exception If there is an error while getting a message.
 */
function getMessageByID($id)
{
    $url = SERVER . "/services/read-messages.php";
    $postData = [
        'key' => API_KEY,
        'id' => $id
    ];
    return sendRequest($url, $postData)["messages"][0];
}

/**
 * @param string $groupID The group ID of messages you want to retrieve.
 *
 * @return array     The array containing messages.
 * @throws Exception If there is an error while getting messages.
 */
function getMessagesByGroupID($groupID)
{
    $url = SERVER . "/services/read-messages.php";
    $postData = [
        'key' => API_KEY,
        'groupId' => $groupID
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param string $status         The status of messages you want to retrieve.
 * @param int    $deviceID       The deviceID of the device which messages you want to retrieve.
 * @param int    $simSlot        Sim slot of the device which messages you want to retrieve. Similar to array index. 1st slot is 0 and 2nd is 1.
 * @param int    $startTimestamp Search for messages sent or received after this time.
 * @param int    $endTimestamp   Search for messages sent or received before this time.
 *
 * @return array     The array containing messages.
 * @throws Exception If there is an error while getting messages.
 */
function getMessagesByStatus($status, $deviceID = null, $simSlot = null, $startTimestamp = null, $endTimestamp = null)
{
    $url = SERVER . "/services/read-messages.php";
    $postData = [
        'key' => API_KEY,
        'status' => $status,
        'deviceID' => $deviceID,
        'simSlot' => $simSlot,
        'startTimestamp' => $startTimestamp,
        'endTimestamp' => $endTimestamp
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param int $id The ID of a message you want to resend.
 *
 * @return array     The array containing a message.
 * @throws Exception If there is an error while resending a message.
 */
function resendMessageByID($id)
{
    $url = SERVER . "/services/resend.php";
    $postData = [
        'key' => API_KEY,
        'id' => $id
    ];
    return sendRequest($url, $postData)["messages"][0];
}

/**
 * @param string $groupID The group ID of messages you want to resend.
 * @param string $status  The status of messages you want to resend.
 *
 * @return array     The array containing messages.
 * @throws Exception If there is an error while resending messages.
 */
function resendMessagesByGroupID($groupID, $status = null)
{
    $url = SERVER . "/services/resend.php";
    $postData = [
        'key' => API_KEY,
        'groupId' => $groupID,
        'status' => $status
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param string $status         The status of messages you want to resend.
 * @param int    $deviceID       The deviceID of the device which messages you want to resend.
 * @param int    $simSlot        Sim slot of the device which messages you want to resend. Similar to array index. 1st slot is 0 and 2nd is 1.
 * @param int    $startTimestamp Resend messages sent or received after this time.
 * @param int    $endTimestamp   Resend messages sent or received before this time.
 *
 * @return array     The array containing messages.
 * @throws Exception If there is an error while resending messages.
 */
function resendMessagesByStatus($status, $deviceID = null, $simSlot = null, $startTimestamp = null, $endTimestamp = null)
{
    $url = SERVER . "/services/resend.php";
    $postData = [
        'key' => API_KEY,
        'status' => $status,
        'deviceID' => $deviceID,
        'simSlot' => $simSlot,
        'startTimestamp' => $startTimestamp,
        'endTimestamp' => $endTimestamp
    ];
    return sendRequest($url, $postData)["messages"];
}

/**
 * @param int    $listID      The ID of the contacts list where you want to add this contact.
 * @param string $number      The mobile number of the contact.
 * @param string $name        The name of the contact.
 * @param bool   $resubscribe Set it to true if you want to resubscribe this contact if it already exists.
 *
 * @return array     The array containing a newly added contact.
 * @throws Exception If there is an error while adding a new contact.
 */
function addContact($listID, $number, $name = null, $resubscribe = false)
{
    $url = SERVER . "/services/manage-contacts.php";
    $postData = [
        'key' => API_KEY,
        'listID' => $listID,
        'number' => $number,
        'name' => $name,
        'resubscribe' => $resubscribe
    ];
    return sendRequest($url, $postData)["contact"];
}

/**
 * @param int    $listID The ID of the contacts list from which you want to unsubscribe this contact.
 * @param string $number The mobile number of the contact.
 *
 * @return array     The array containing the unsubscribed contact.
 * @throws Exception If there is an error while setting subscription to false.
 */
function unsubscribeContact($listID, $number)
{
    $url = SERVER . "/services/manage-contacts.php";
    $postData = [
        'key' => API_KEY,
        'listID' => $listID,
        'number' => $number,
        'unsubscribe' => true
    ];
    return sendRequest($url, $postData)["contact"];
}

/**
 * @return string    The amount of message credits left.
 * @throws Exception If there is an error while getting message credits.
 */
function getBalance()
{
    $url = SERVER . "/services/send.php";
    $postData = [
        'key' => API_KEY
    ];
    $credits = sendRequest($url, $postData)["credits"];
    return is_null($credits) ? "Unlimited" : $credits;
}

/**
 * @param string $request   USSD request you want to execute. e.g. *150#
 * @param int $device       The ID of a device you want to use to send this message.
 * @param int|null $simSlot Sim you want to use for this USSD request. Similar to array index. 1st slot is 0 and 2nd is 1.
 *
 * @return array     The array containing details about USSD request that was sent.
 * @throws Exception If there is an error while sending a USSD request.
 */
function sendUssdRequest($request, $device, $simSlot = null)
{
    $url = SERVER . "/services/send-ussd-request.php";
    $postData = [
        'key' => API_KEY,
        'request' => $request,
        'device' => $device,
        'sim' => $simSlot
    ];
    return sendRequest($url, $postData)["request"];
}

/**
 * @param int $id The ID of a USSD request you want to retrieve.
 *
 * @return array     The array containing details about USSD request you requested.
 * @throws Exception If there is an error while getting a USSD request.
 */
function getUssdRequestByID($id)
{
    $url = SERVER . "/services/read-ussd-requests.php";
    $postData = [
        'key' => API_KEY,
        'id' => $id
    ];
    return sendRequest($url, $postData)["requests"][0];
}

/**
 * @param string   $request        The request text you want to look for.
 * @param int      $deviceID       The deviceID of the device which USSD requests you want to retrieve.
 * @param int      $simSlot        Sim slot of the device which USSD requests you want to retrieve. Similar to array index. 1st slot is 0 and 2nd is 1.
 * @param int|null $startTimestamp Search for USSD requests sent after this time.
 * @param int|null $endTimestamp   Search for USSD requests sent before this time.
 *
 * @return array     The array containing USSD requests.
 * @throws Exception If there is an error while getting USSD requests.
 */
function getUssdRequests($request, $deviceID = null, $simSlot = null, $startTimestamp = null, $endTimestamp = null)
{
    $url = SERVER . "/services/read-ussd-requests.php";
    $postData = [
        'key' => API_KEY,
        'request' => $request,
        'deviceID' => $deviceID,
        'simSlot' => $simSlot,
        'startTimestamp' => $startTimestamp,
        'endTimestamp' => $endTimestamp
    ];
    return sendRequest($url, $postData)["requests"];
}

function sendRequest($url, $postData)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }
    curl_close($ch);
    if ($httpCode == 200) {
        $json = json_decode($response, true);
        if ($json == false) {
            if (empty($response)) {
                throw new Exception("Missing data in request. Please provide all the required information to send messages.");
            } else {
                throw new Exception($response);
            }
        } else {
            if ($json["success"]) {
                return $json["data"];
            } else {
                throw new Exception($json["error"]["message"]);
            }
        }
    } else {
        throw new Exception("HTTP Error Code : {$httpCode}");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*

try {
    // Send a message using the primary device.
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.");

    // Send a message using the Device ID 1.
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.", 94);

     // Send a prioritize message using Device ID 1 for purpose of sending OTP, message reply etc…
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.", 94, null, false, null, true);

    // Send a MMS message with image using the Device ID 1.
    $attachments = "https://example.com/images/footer-logo.png,https://example.com/downloads/sms-gateway/images/section/create-chat-bot.png";
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.", 94, null, true, $attachments);

    // Send a message using the SIM in slot 1 of Device ID 1 (Represented as "1|0").
    // SIM slot is an index so the index of the first SIM is 0 and the index of the second SIM is 1.
    // In this example, 1 represents Device ID and 0 represents SIM slot index.
    $msg = sendSingleMessage("+8801909756552", "This is a test of single message.", "94|1");

    // Send scheduled message using the primary device.
    $msg = sendSingleMessage("+8801909756552", "This is a test of schedule feature.", null, strtotime("+2 minutes"));
    print_r($msg);

    echo "Successfully sent a message.";
} catch (Exception $e) {
    echo $e->getMessage();
}
 */


//  $messages = array();

// for ($i = 1; $i <= 3; $i++) {
//     array_push($messages,
//         [
//             "number" => "+8801909756552",
//             "message" => "This is a test #{$i} of PHP version. Testing bulk message functionality."
//         ]);
// }

// try {
//     // Send messages using the primary device.
//     $msgs = sendMessages($messages);

    // Send messages using default SIM of all available devices. Messages will be split between all devices.
   //sendMessages($messages, USE_ALL_DEVICES);

    // Send messages using all SIMs of all available devices. Messages will be split between all SIMs.
    //sendMessages($messages, USE_ALL_SIMS);

    // Send messages using only specified devices. Messages will be split between devices or SIMs you specified.
    // If you send 12 messages using this code then 4 messages will be sent by Device ID 1, other 4 by SIM in slot 1 of
    // Device ID 2 (Represendted as "2|0") and remaining 4 by SIM in slot 2 of Device ID 2 (Represendted as "2|1").
   // sendMessages($messages, USE_SPECIFIED, [1, "2|0", "2|1"]);

    // Send messages on schedule using the primary device.
   // sendMessages($messages, null, null, strtotime("+2 minutes"));

    // Send a message to contacts in contacts list with ID of 1.
    //sendMessageToContactsList(1, "Test", USE_SPECIFIED, 1);

    // Send a message on schedule to contacts in contacts list with ID of 1.
   // sendMessageToContactsList(1, "Test", null, null, strtotime("+2 minutes"));

    // Array of image links to attach to MMS message;
/*     $attachments = [
        "https://example.com/images/footer-logo.png",
        "https://example.com/downloads/sms-gateway/images/section/create-chat-bot.png"
    ];
    $attachments = implode(',', $attachments);

    $mmsMessages = [];
    for ($i = 1; $i <= 12; $i++) {
        array_push($mmsMessages,
            [
                "number" => "+11234567890",
                "message" => "This is a test #{$i} of PHP version. Testing bulk MMS message functionality.",
                "type" => "mms",
                "attachments" => $attachments
            ]);
    } */
    // Send MMS messages using all SIMs of all available devices. Messages will be split between all SIMs.
   // $msgs = sendMessages($mmsMessages, USE_ALL_SIMS);

//     print_r($msgs);

//     echo "Successfully sent bulk messages.";
// } catch (Exception $e) {
//     echo $e->getMessage();
// }


    function smsSend($deccription='',$applicant_mobile='01909756552'){

        // $messages = array();
        // array_push(
        //     $messages,
        //     [
        //         "number" => '88' . int_bn_to_en($applicant_mobile),
        //         "message" => "$deccription"
        //     ]
        // );
        // ///sms functions
        // try {
        //     $msgs = sendMessages($messages,1);
        // } catch (Exception $e) {
        //     array_push($responsemessege, $e->getMessage());
        // }


    }



function SmsNocSmsSend($deccription = '', $applicant_mobile = '01909756552')
{
// return $applicant_mobile;

    $smsnocapikey = '108|DuxHEDfb1kQKISfSZCJ980XfCKQ2mpwvCCLThVqf';
    $smsnocsenderid = '8809617611301';





    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://app.smsnoc.com/api/v3/sms/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
        "recipient":"88'.$applicant_mobile.'",
        "sender_id":"'.$smsnocsenderid.'",
        "type":"plain",
        "message":"'.$deccription.'"
        }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Bearer '.$smsnocapikey.''
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // echo $response;

}





function characterCount($string){
    // replace array below with proper Bengali stopwords
    $stopWords = array('i','a','about','an','and','are','as','at','be','by','com','de','en','for','from','how','in','is','it','la','of','on','or','that','the','this','to','was','what','when','where','who','will','with','und','the','www');

    $string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
    $string = trim($string); // trim the string
    // remove this preg_replace because Bengali sybmols doesn't match this pattern
    // $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
    $string = strtolower($string); // make it lowercase

    preg_match_all('/\s.*?\s/i', $string, $matchWords);
    $matchWords = $matchWords[0];

    foreach ( $matchWords as $key=>$item ) {
        if ( $item == '' || in_array(strtolower(trim($item)), $stopWords) || strlen($item) <= 3 ) {
            unset($matchWords[$key]);
        }
    }
    $wordCountArr = array();
    if ( is_array($matchWords) ) {
        foreach ( $matchWords as $key => $val ) {
            $val = trim(strtolower($val));
            if ( isset($wordCountArr[$val]) ) {
                $wordCountArr[$val]++;
            } else {
                $wordCountArr[$val] = 1;
            }
        }
    }
    arsort($wordCountArr);
    $wordCountArr = array_slice($wordCountArr, 0, 10);
    return $wordCountArr;
}

// $string = <<<EOF
// টিপ বোঝে না, টোপ বোঝে না টিপ বোঝে না, কেমন বাপু লোক
// EOF;
// var_dump(extractCommonWords($string), $string);




    function latestProductByCat(){
        $categories = Category::all();

        foreach ($categories as $child) {
            $child->load([
                'products' => function ($query) {
                    $query->latest()->take(1);
                },
            ]);
        }




        $products = collect();

        foreach ($categories as $category) {
            if ($category->products->isNotEmpty()) {
                $product = $category->products->first();
                $product->load(['categories' => function ($query) {
                    $query->latest();
                }]);
                $products->push($product);
            }
        }
        return $products;
    }

     function updateCartUser($user_id)
{


    $cartItems = Cart::where('user_id', $user_id)->get();

    if ($cartItems->isEmpty()) {
        return response()->json(['message' => 'No cart items found for the user'], 404);
    }

    foreach ($cartItems as $cartItem) {

        $cartItem->user_id = $user_id;
        $cartItem->save();
    }

    return response()->json(['message' => 'Cart items updated successfully'], 200);
}



function EditorImages() {


    $galleries = Gallery::with('images')->get();

    $data = [];
    $i = 1;
    foreach ($galleries as $gallery) {
        foreach ($gallery->images as $image) {
            array_push($data,[
                'title'=> "$gallery->title Image $i",
                'value'=> asset($image->image_path)
            ]);
            $i++;
        }
    }

    return $data;

}



function tinyInt(){


    $data = [
        'selector'=> 'textarea#open-source-plugins',
        'plugins'=> 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
        'editimage_cors_hosts'=> ['picsum.photos'],
        'menubar'=> 'file edit view insert format tools table help',
        'toolbar'=> 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        'toolbar_sticky'=> true,
        'autosave_ask_before_unload'=> true,
        'autosave_interval'=> '30s',
        'autosave_prefix'=> '{path}{query}-{id}-',
        'autosave_restore_when_empty'=> false,
        'autosave_retention'=> '2m',
        'image_advtab'=> true,
        'link_list'=> [
            [ 'title'=> 'My page 1', 'value'=> 'https://www.tiny.cloud' ],
            [ 'title'=> 'My page 2', 'value'=> 'http://www.moxiecode.com' ]
        ],

        'image_list'=> EditorImages(),

        'image_class_list'=> [
            [ 'title'=> 'None', 'value'=> '' ],
            [ 'title'=> 'Some class', 'value'=> 'class-name' ]
        ],
        'importcss_append'=> true,

        'templates'=> [
            [ 'title'=> 'New Table', 'description'=> 'creates a new table', 'content'=> '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' ],
            [ 'title'=> 'Starting my story', 'description'=> 'A cure for writers block', 'content'=> 'Once upon a time...' ],
            [ 'title'=> 'New list with dates', 'description'=> 'New List with dates', 'content'=> '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' ]
        ],
        'template_cdate_format'=> '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        'template_mdate_format'=> '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        'height'=> 600,
        'image_caption'=> true,
        'quickbars_selection_toolbar'=> 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        'noneditable_class'=> 'mceNonEditable',
        'toolbar_mode'=> 'sliding',
        'contextmenu'=> 'link image table',
        'content_style'=> 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    ];
    return $data;


}
