<?php
sendx("Hello World I'am Bot");

function sendx($msg){
		$strAccessToken = "oKfXSEXkmDRNdxcUrkAJrvoJ49gdmeCM+MoMbpLXOKXicGis8P7YsIWT0f5BBYP9h3xjTVxRkUdyQGKr3rg6X5nRmSnIMEe7w9+oZ4fKO8d6rEZeiGruIfNwV5eFmsMoPHbb9fdbw92/nWN/jsPpPgdB04t89/1O/w1cDnyilFU=";

		$strUrl = "https://api.line.me/v2/bot/message/push";
		$arrHeader = array();
		$arrHeader[] = "Content-Type: application/json";
		$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

		$arrPostData = array();
		$arrPostData['to'] = "Ub5bd2d0b18e3e8f76cd94e897f05c654";
		//$arrPostData['to'] = $x;
		$arrPostData['messages'][0]['type'] = "text";
		$arrPostData['messages'][0]['text'] = $msg;
		
	    $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$strUrl);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close ($ch);
}

 
?>
