<?php
$response = $_POST['g-recaptcha-response'];
if (empty($response)){
    echo json_encode(['success' => false, 'message' =>'Por favor, complete el captcha']);
    die();
    exit();
}
$url = "https://www.google.com/recaptcha/api/siteverify?secret=6Ldx6ZwkAAAAAMQgFRw7mutjZpr3hzpBI0YcVYAH&response=$response";
$curl = curl_init();
curl_setopt($curl,CURLOPT_HTTPHEADER,array (
    "Content-Type: application/json; charset=utf-8",
    "Content-Length: 0"
));

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>