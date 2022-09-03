<?php
class Fetch { 

  private $db;

  public function __construct(){
    $this->db = new Database;
  }
 
  public function getTheTransactions(){
/**
* fetch_access_token.php
* Fetch Access / Bearer Token from PayPal
*/


$curl = curl_init();

$url = "https://api.sandbox.paypal.com/v1/oauth2/token";
$clientId = "AeLE-8_kzO7OpyUbSbf9UNrEiGFoGLuuivsqxk-4jua9QVf5G9Il_WMpH4MMCRCwQg1j9pH1J7ruaCjG";

$secret = "EDQ79_hw2W-wXyooNBYm71gQRINUJT19BhkycF93o2usUN59VF18cU_wGh0VgURFp5GiECKrbrJ2m8cq";

curl_setopt_array($curl, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
//We need to send grant_type=client_credentials in POST Request Body
CURLOPT_POSTFIELDS => "grant_type=client_credentials",
//Setting Basic Authentication using Client ID and Secret
CURLOPT_USERPWD => $clientId.":".$secret,
// This specific header needs to be set for the API call to work
CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded"),)
); 

//make API request
$result = curl_exec($curl);

//close connection
curl_close($curl);

//convert json response into PHP associative array
$response = json_decode($result, true);

//print_r($response);



/**
 * fetch_transactions_list.php
 * Fetch A List of all transactions
 */

//start date to filter transactions from
date_default_timezone_set('Asia/Kolkata');
$date_this = strtotime("-1 Months");
$date_minus = date("Y-m-d\TH:i:s\Z", $date_this);
$start_date = $date_minus;
//$start_date = '2021-11-23T23:59:59-0000';
//print_r($start_date);

//end date to filter transactions from
$end_date = date("Y-m-d\TH:i:s\Z");
//$end_date = '2021-12-22T03:59:59-0000';
//print_r($end_date);
//The access token we obtained in the previous sections
if(isset($response['access_token'])){
  $access_token = $response['access_token'];
} else {
  echo "! ";
  return false;
}
$curl = curl_init();

/**
 * Build custom Curl Object
 */
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.sandbox.paypal.com/v1/reporting/transactions?start_date={$start_date}&end_date={$end_date}",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer {$access_token}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

//print_r($response);
return $response;
/*
include 'Payments.php';

AddResponse($response);
*/
//return $response;

}

}
?>