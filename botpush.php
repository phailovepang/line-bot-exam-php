<?php

require "vendor/autoload.php";

$access_token = 'oKfXSEXkmDRNdxcUrkAJrvoJ49gdmeCM+MoMbpLXOKXicGis8P7YsIWT0f5BBYP9h3xjTVxRkUdyQGKr3rg6X5nRmSnIMEe7w9+oZ4fKO8d6rEZeiGruIfNwV5eFmsMoPHbb9fdbw92/nWN/jsPpPgdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'e03fcec4b046f94fb30f5cf71b262648';

$pushID = 'Ub5bd2d0b18e3e8f76cd94e897f05c654';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$data = file_get_contents('http://apecpv.cmru.ac.th:1880/erdibot');
$character = json_decode("HELLO");

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($character[0]->data);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







