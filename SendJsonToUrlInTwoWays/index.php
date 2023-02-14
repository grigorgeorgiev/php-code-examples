<?php

//curl method
$url = "your url";    
$content = json_encode("your data to be sent");

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 201 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}

curl_close($curl);

$response = json_decode($json_response, true);


//without any external libraries
$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );
//$response is an object. Properties can be accessed as usual, e.g. $response->...

//where $data is the array contaning your data:

$data = array(
  'userID'      => 'a7664093-502e-4d2b-bf30-25a2b26d6021',
  'itemKind'    => 0,
  'value'       => 1,
  'description' => 'Boa saudaÁ„o.',
  'itemID'      => '03e76d0a-8bab-11e0-8250-000c29b481aa'
);
//Warning: this won't work if the allow_url_fopen setting is set to Off in the php.ini.
