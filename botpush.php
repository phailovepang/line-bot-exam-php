<?php



require "vendor/autoload.php";

$access_token = 'oKfXSEXkmDRNdxcUrkAJrvoJ49gdmeCM+MoMbpLXOKXicGis8P7YsIWT0f5BBYP9h3xjTVxRkUdyQGKr3rg6X5nRmSnIMEe7w9+oZ4fKO8d6rEZeiGruIfNwV5eFmsMoPHbb9fdbw92/nWN/jsPpPgdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'e03fcec4b046f94fb30f5cf71b262648';

$pushID = 'Ub5bd2d0b18e3e8f76cd94e897f05c654';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

// Create a curl handle
// ตัวเลขไอดี เราใช้ตัวแปรมาแทน ได้น่ะครับ 
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:1880/erdibot");
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);
// แปลงข้อมูลที่รับมาในรูป json มาเป็น array จะได้ใช้ง่าย ๆ
$DATA= json_decode($result, true);
// //dump ข้อมูลออกมาดู
print_r($DATA);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($DATA);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







